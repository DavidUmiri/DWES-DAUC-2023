<?php
// Adaptación de este tutorial: https://code.tutsplus.com/tutorials/how-to-build-a-simple-rest-api-in-php--cms-37000
//  - Quitando la orientación a objetos como prueba de concepto
//  - con los datos en un fichero serializado en vez de BBDD
//  dicho artículo solo implementa el list de todos los artículos.
// Para el resto de operaciones nos basamos en:
//  https://www.positronx.io/create-simple-php-crud-rest-api-with-mysql-php-pdo
//
// Ejemplo del stock de frutas, inicialmente con un fichero sin BBDD
// Uso el arquetipo store ( https://restfulapi.net/resource-naming/ )
// No uso de momento query ya que se reserva para filtros
// Puntos de entrada:
// /productos  → lista con GET, añade con POST, borra con DELETE
// /productos/nombre-producto → según GET, PATCH lee o actualiza
//
// Desplegado en http://www.misitio.com/rest/productos
// o  http://www.misitio.com/rest/productos/index.php
// con puntos de acceso individuales por cada producto:
//  http://www.misitio.com/rest/productos/index.php/fresas
//
/*
  Se puede conseguir que resonda a http://www.misitio.com/rest/productos/fresas
  Necesitamos activar el módulo rewrite:
sudo a2enmod rewrite

  y habilitar el procesado de archivos .htacces en la configuración de Apache,
  dentro del <Directory> de la raiz del sitio web donde lo despleguemos:
AllowOverride All 

  para así poder poner la siguiente configuración en archivo .htaccess en la 
  carpeta donde esté este index.php:
RewriteEngine On
RewriteBase /rest/productos
RewriteCond %{REQUEST_FILENAME} !-f
RewriteCond %{REQUEST_FILENAME} !-d
RewriteRule ^(.*)$ index.php/$1 [PT,L,QSA]

*/
//
//  Responde a los siguientes métodos:
//   GET -> todos o uno según acceso con URI producto o sin
//   DELETE -> de uno, tanto con como sin URI producto, en el primer
//     caso debe mandarse por json el producto
//   POST -> crear nuevo producto, sin URI producto, datos por json
//   PUT -> modificar stock de producto, sin URI producto, por json
//   PATCH -> modificar stock de producto con URI producto +  json
/*
 * Formato JSON:
 * {
 *   "name" : "producto",
 *   "stock" : cantidad
 * }
 *
 * listar todos devuelve { "fresas" : 100 , "kiwis" : 10 , ....
 * ¿debería devolver { { "name" : "fresas" , "stock" : 100 } , { ... ??
 * ¿por consistencia? mirarlo
 * ¿o modo diccionari con URI de cada producto: no, hemos elegido
 * el arquetipo stock o colección
 */

// Fichero con los datos, lo mantenemos en la ruta local
define("RUTA_FICHERO_STOCK", "stock.ser");

// Nada más empezar leo los contenidos del fichero al array stock
// GET PRODUCTS:
if (file_exists(RUTA_FICHERO_STOCK)) {
    $stock = unserialize(file_get_contents(RUTA_FICHERO_STOCK));
}

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uriItems = explode('/', $uri);
$lastUriItem = $uriItems[count($uriItems) - 1];

// Punto de entrada sin .../item  
// echo "TRAZA: " . $lastUriItem;
$requestMethod = strtoupper($_SERVER["REQUEST_METHOD"]);
if (preg_match("/php$/", $lastUriItem) || ($lastUriItem == "")) {
    switch ($requestMethod) { // los datos les llegarán por JSON en el body
        case "GET":
            listAction($stock);
            break;
        case "DELETE":
            deleteAction($stock);
            break;
        case "PUT":
            modifyAction($stock);
            break;
        case "POST":
            createAction($stock);
            break;
        default:
            $strErrorDesc = 'Method not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
            sendOutput(
                json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
    } // switch requestMethod
} else { // Punto de entrada .../RECURSO/item
    if (!isset($stock[$lastUriItem])) {
        $strErrorDesc = 'Object doesnot exists';
        $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        sendOutput(
            json_encode(array('error' => $strErrorDesc)),
            array('Content-Type: application/json', $strErrorHeader)
        );
    } else {
        // Formato "nombre-producto" : stock
        // $item = array_intersect_key($stock,array_flip([$lastUriItem]));
        $itemName = $lastUriItem;
        $item = ['name' => $lastUriItem, 'stock' => $stock[$itemName]];
        switch ($requestMethod) {
            case "GET":
                accessAction($item);
                break;
            case "DELETE":
                deleteAction($stock, $itemName);
                break;
            case "PATCH":
                modifyAction($stock, $itemName);
                break;
            default:
                $strErrorDesc = 'Method not supported';
                $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
                sendOutput(
                    json_encode(array('error' => $strErrorDesc)),
                    array('Content-Type: application/json', $strErrorHeader)
                );
        } // switch requestMethod
    }
} // if-else-punto-de-entrada


function accessAction($item)
{
    $responseData = json_encode($item);
    sendOutput(
        $responseData,
        array('Content-Type: application/json', 'HTTP/1.1 200 OK')
    );
} // accessAction

function deleteAction($stock, $item = NULL)
{
    // miro si me llega item o lo pilamos por el body
    if (isset($item)) {
        $name = $item;
    } else {
        $data = json_decode(file_get_contents("php://input"));
        if (empty($data->name)) {
            $strErrorDesc = 'Missing name';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
            sendOutput(
                json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
            exit();
        }
        $name = $data->name;
    }
    if (!isset($stock[$name])) {
        $strErrorDesc = 'Object doesnot exists';
        $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        sendOutput(
            json_encode(array('error' => $strErrorDesc)),
            array('Content-Type: application/json', $strErrorHeader)
        );
        exit();
    }
    unset($stock[$name]);
    saveStock($stock);
    http_response_code(201);
    sendOutput(
        json_encode(array("message" => "Item was deleted.")),
        array('Content-Type: application/json', 'HTTP/1.1 200 OK')
    );
} // deleteAction


function modifyAction($stock, $item = NULL)
{
    $data = json_decode(file_get_contents("php://input"));
    if (
        !empty($data->name) && !empty($data->stock) &&
        (!isset($item) || $data->name == $item)
    ) {
        if (isset($stock[$data->name])) {
            $stock[$data->name] = $data->stock;
            saveStock($stock);
            http_response_code(201);
            sendOutput(
                json_encode(array("message" => "Item was modified.")),
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            http_response_code(400);
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
            sendOutput(
                json_encode(array("message" => "Unable to modify item. Items does not exist or name mismatch.")),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    } else {
        http_response_code(400);
        $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        sendOutput(
            json_encode(array("message" => "Unable to create item. Data is incomplete.")),
            array('Content-Type: application/json', $strErrorHeader)
        );
    }
} // modifyAction

function createAction($stock)
{
    $data = json_decode(file_get_contents("php://input"));
    if (!empty($data->name) && !empty($data->stock)) {
        if (!isset($stock[$data->name])) {
            $stock[$data->name] = $data->stock;
            saveStock($stock);
            http_response_code(201);
            sendOutput(
                json_encode(array("message" => "Item was created.")),
                array('Content-Type: application/json', 'HTTP/1.1 200 OK')
            );
        } else {
            http_response_code(400);
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
            sendOutput(
                json_encode(array("message" => "Unable to create item. Items already exists.")),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
    } else {
        http_response_code(400);
        $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        sendOutput(
            json_encode(array("message" => "Unable to create item. Data is incomplete.")),
            array('Content-Type: application/json', $strErrorHeader)
        );
    }
} // createAction

function saveStock($stock)
{
    file_put_contents(RUTA_FICHERO_STOCK, serialize($stock));
} // saveStock

function listAction($stock)
{
    $strErrorDesc = '';
    if ($stock) {
        $responseData = json_encode($stock);
    } else {
        // $strErrorDesc = $stock->getMessage() . 'Something went wrong! Please contact support.';
        $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
    }
    // send output
    if (!$strErrorDesc) {
        sendOutput(
            $responseData,
            array('Content-Type: application/json', 'HTTP/1.1 200 OK')
        );
    } else {
        sendOutput(
            json_encode(array('error' => $strErrorDesc)),
            array('Content-Type: application/json', $strErrorHeader)
        );
    }
} // listAction


// FUNCIONES DE APOYO:
function getUriSegments()
{
    $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
    $uri = explode('/', $uri);

    return $uri;
}

/**
 * Get querystring params.
 *
 * @return array
 */
function getQueryStringParams()
{
    return parse_str($_SERVER['QUERY_STRING'], $query);
}

/**
 * Send API output.
 *
 * @param mixed  $data
 * @param string $httpHeader
 */
function sendOutput($data, $httpHeaders = array())
{
    header_remove('Set-Cookie');

    if (is_array($httpHeaders) && count($httpHeaders)) {
        foreach ($httpHeaders as $httpHeader) {
            header($httpHeader);
        }
    }

    echo $data;
    exit;
}
