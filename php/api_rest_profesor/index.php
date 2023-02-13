<?php
// Desplegado en http://www.misitio.com/rest/frutas/index.php/stock/list/
//  importante porque el 5 que viene más abajo es por el nivel de 
//  profundidad de carpetas (recursos separados por / )
define("RUTA_FICHERO_STOCK", "stock.ser");

$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uri = explode('/', $uri);

if ((isset($uri[4]) && $uri[4] != 'stock') || !isset($uri[3])) {
    //    header("HTTP/1.1 404 Not Found");
    print_r($uri);
    exit();
}

$strErrorDesc = '';
$requestMethod = $_SERVER["REQUEST_METHOD"];
$arrQueryStringParams = getQueryStringParams();

if (strtoupper($requestMethod) == 'GET') {
    try {
        $intLimit = 10;
        if (isset($arrQueryStringParams['limit']) && $arrQueryStringParams['limit']) {
            $intLimit = $arrQueryStringParams['limit'];
        }

        // GET PRODUCTS:
        if (file_exists(RUTA_FICHERO_STOCK)) {
            $stock = unserialize(file_get_contents(RUTA_FICHERO_STOCK));
        }
        $responseData = json_encode($stock);
    } catch (Error $e) {
        $strErrorDesc = $e->getMessage() . 'Something went wrong! Please contact support.';
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
