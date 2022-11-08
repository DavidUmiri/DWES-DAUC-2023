<?php
// Copia y pega de este tutorial: https://code.tutsplus.com/tutorials/how-to-build-a-simple-rest-api-in-php--cms-37000
//  quitando la orientación a objetos como prueba de concepto
//  y con los datos en un fichero serializado en vez de BBDD
//  dicho artículo solo implementa el list de todos los artículos.
// Para el resto de operaciones nos basamos en:
//  https://www.positronx.io/create-simple-php-crud-rest-api-with-mysql-php-pdo
//
//
// Desplegado en http://www.misitio.com/rest/frutas/index.php/stock/list/
// también se podría acceder como http://www.misitio.com/rest/frutas/#/stock/list/
// pero perdería la referencia a stock y list y no funciona
//  importante porque el 5 que viene más abajo es por el nivel de 
//  profundidad de carpetas (recursos separados por / )

// Profundidad de ruta del despliegue:
// investigar si no la podemos calcular automáticamente a partir del uri
define("DEPTH", 4);
// Nombre del recurso (en la ruta)
define("RECURSO", "stock");

// Fichero con los datos, lo mantenemos en la ruta local
define("RUTA_FICHERO_STOCK", "stock.ser");

// Nada más empezar leo los contenidos del fichero al array stock
// GET PRODUCTS:
if (file_exists(RUTA_FICHERO_STOCK)) {
    $stock = unserialize(file_get_contents(RUTA_FICHERO_STOCK));
}

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

if ((isset($uri[DEPTH]) && $uri[DEPTH] != RECURSO) || !isset($uri[DEPTH + 1])) {
    header("HTTP/1.1 404 Not Found");
    print_r($uri);
    exit();
}

$accion = $uri[DEPTH + 1];

switch ($accion) {
    case "delete":
        deleteAction($stock);
        break;
    case "create":
        createAction($stock);
        break;
    case "list":
        listAction($stock);
        break;
    case "modify":
        modifyAction($stock);
        break;
    default:
        if (isset($stock[$accion])) {
            accessAction(array_intersect_key($stock, array_flip([$accion])));
            //$stock[$accion]);
        } else {
            $strErrorDesc = 'Action not supported';
            $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
            sendOutput(
                json_encode(array('error' => $strErrorDesc)),
                array('Content-Type: application/json', $strErrorHeader)
            );
        }
} // switch ($accion)

function accessAction($item)
{
    $responseData = json_encode($item);
    sendOutput(
        $responseData,
        array('Content-Type: application/json', 'HTTP/1.1 200 OK')
    );
} // accessAction

function deleteAction($stock)
{
    $requestMethod = $_SERVER["REQUEST_METHOD"];
    if (strtoupper($requestMethod) != 'DELETE') {
        $strErrorDesc = 'Incorrect method';
        $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        sendOutput(
            json_encode(array('error' => $strErrorDesc)),
            array('Content-Type: application/json', $strErrorHeader)
        );
        exit();
    }
    // $arrQueryStringParams = getQueryStringParams();
    // if (!isset($arrQueryStringParams['name'])) {
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
    //    $name = $arrQueryStringParams['name'];
    $name = $data->name;
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


function modifyAction($stock)
{
    $requestMethod = $_SERVER["REQUEST_METHOD"];
    if (strtoupper($requestMethod) != 'POST') {
        $strErrorDesc = 'Incorrect method';
        $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        sendOutput(
            json_encode(array('error' => $strErrorDesc)),
            array('Content-Type: application/json', $strErrorHeader)
        );
        exit;
    }
    $data = json_decode(file_get_contents("php://input"));
    if (!empty($data->name) && !empty($data->stock)) {
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
                json_encode(array("message" => "Unable to modify item. Items does not exist.")),
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
    $requestMethod = $_SERVER["REQUEST_METHOD"];
    if (strtoupper($requestMethod) != 'PUT') {
        $strErrorDesc = 'Incorrect method';
        $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
        sendOutput(
            json_encode(array('error' => $strErrorDesc)),
            array('Content-Type: application/json', $strErrorHeader)
        );
        exit;
    }
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
    $requestMethod = $_SERVER["REQUEST_METHOD"];
    $arrQueryStringParams = getQueryStringParams();

    // $intLimit = $arrQueryStringParams['limit'];
    if (strtoupper($requestMethod) == 'GET') {
        // implementar sustituir stock or el URI de cada producto
        if ($stock) {
            $responseData = json_encode($stock);
        } else {
            $strErrorDesc = $stock->getMessage() . 'Something went wrong! Please contact support.';
            $strErrorHeader = 'HTTP/1.1 500 Internal Server Error';
        }
    } else {
        $strErrorDesc = 'Method not supported';
        $strErrorHeader = 'HTTP/1.1 422 Unprocessable Entity';
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
