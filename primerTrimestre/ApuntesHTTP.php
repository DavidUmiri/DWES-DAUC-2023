<?php

// Ejemplo de autenticacion HTTP Basic
if (!isset($_SERVER['PHP_AUTH_USER'])) {
    header('WWW-Authenticate: Basic realm="Mi dominio"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Texto a enviar si el usuario pulsa el botón Cancelar';
    exit;
} else {
    echo "<p>Hola {$_SERVER['PHP_AUTH_USER']}.</p>";
    echo "<p>Introdujo {$_SERVER['PHP_AUTH_PW']} como su contraseña.</p>";
}

// ***************************************************************

// Ejemplo de autenticacion HTTP DIGEST, es más segura cuando no estas con https
$dominio = 'Area restringida';

// usuario => contraseña
$usuarios = array('admin' => 'admin', 'invitado' => 'invitado');


if (empty($_SERVER['PHP_AUTH_DIGEST'])) {
    header('HTTP/1.1 401 Unauthorized');
    header('WWW-Authenticate: Digest realm="' . $dominio . '",qop="auth",nonce="' . uniqid() . '" opaque="' . md5($dominio) . '"');

    die('Texto a enviar si el usuario pulsa el botón Cancelar');
}


// Analizar la variable PHP_AUTH_DIGEST
if (
    !($datos = analizar_http_digest($_SERVER['PHP_AUTH_DIGEST'])) ||
    !isset($usuarios[$datos['username']])
)
    die('Credenciales incorrectas');


// Generar una respuesta válida
$A1 = md5($datos['username'] . ':' . $dominio . ':' . $usuarios[$datos['username']]);
$A2 = md5($_SERVER['REQUEST_METHOD'] . ':' . $datos['uri']);
$respuesta_válida = md5($A1 . ':' . $datos['nonce'] . ':' . $datos['nc'] . ':' . $datos['cnonce'] . ':' . $datos['qop'] . ':' . $A2);

if ($datos['response'] != $respuesta_válida)
    die('Credenciales incorrectas');

// Todo bien, usuario y contraseña válidos
echo 'Se ha identificado como: ' . $datos['username'];


// Función para analizar la cabecera de autenticación HTTP
function analizar_http_digest($txt)
{
    // Protección contra datos ausentes
    $partes_necesarias = array('nonce' => 1, 'nc' => 1, 'cnonce' => 1, 'qop' => 1, 'username' => 1, 'uri' => 1, 'response' => 1);
    $datos = array();
    $claves = implode('|', array_keys($partes_necesarias));

    preg_match_all('@(' . $claves . ')=(?:([\'"])([^\2]+?)\2|([^\s,]+))@', $txt, $coincidencias, PREG_SET_ORDER);

    foreach ($coincidencias as $c) {
        $datos[$c[1]] = $c[3] ? $c[3] : $c[4];
        unset($partes_necesarias[$c[1]]);
    }

    return $partes_necesarias ? false : $datos;
}

// ***************************************************************

// Ejemplo de autenticacion HTTP forzando un nuevo usuario/contraseña
function autenticar()
{
    header('WWW-Authenticate: Basic realm="Sistema de autenticación de prueba"');
    header('HTTP/1.0 401 Unauthorized');
    echo "Debe introducir un ID y contraseña de identificación válidos para acceder a este recurso\n";
    exit;
}

if (
    !isset($_SERVER['PHP_AUTH_USER']) ||
    ($_POST['VistoAntes'] == 1 && $_POST['UsuarioAntiguo'] == $_SERVER['PHP_AUTH_USER'])
) {
    autenticar();
} else {
    echo "<p>Bienvenido: " . htmlspecialchars($_SERVER['PHP_AUTH_USER']) . "<br />";
    echo "Antiguo: " . htmlspecialchars($_REQUEST['UsuarioAntiguo']);
    echo "<form action='' method='post'>\n";
    echo "<input type='hidden' name='VistoAntes' value='1' />\n";
    echo "<input type='hidden' name='UsuarioAntiguo' value=\"" . htmlspecialchars($_SERVER['PHP_AUTH_USER']) . "\" />\n";
    echo "<input type='submit' value='Reautenticar' />\n";
    echo "</form></p>\n";
}

// ***************************************************************

// Basic authorization with retries

$valid_passwords = array("mario" => "carbonell");
$valid_users = array_keys($valid_passwords);

$user = $_SERVER['PHP_AUTH_USER'];
$pass = $_SERVER['PHP_AUTH_PW'];

$validated = (in_array($user, $valid_users)) && ($pass == $valid_passwords[$user]);

if (!$validated) {
    header('WWW-Authenticate: Basic realm="My Realm"');
    header('HTTP/1.0 401 Unauthorized');
    die("Not authorized");
}

// If arrives here, is a valid user.
echo "<p>Welcome $user.</p>";
echo "<p>Congratulation, you are into the system.</p>";

// ***************************************************************

// login, logout and relogin

// "http://localhost/admin/?login" - for Login,
// "http://localhost/admin/?logout" - for Logout,
// "http://localhost/admin/?logout&login" - for Re-Login.

session_start();

$authorized = false;

# LOGOUT
if (isset($_GET['logout']) && !isset($_GET["login"]) && isset($_SESSION['auth'])) {
    $_SESSION = array();
    unset($_COOKIE[session_name()]);
    session_destroy();
    echo "logging out...";
}

# checkup login and password
if (isset($_SERVER['PHP_AUTH_USER']) && isset($_SERVER['PHP_AUTH_PW'])) {
    $user = 'test';
    $pass = 'test';
    if (($user == $_SERVER['PHP_AUTH_USER']) && ($pass == ($_SERVER['PHP_AUTH_PW'])) && isset($_SESSION['auth'])) {
        $authorized = true;
    }
}

# login
if (
    isset($_GET["login"]) && !$authorized ||
    # relogin
    isset($_GET["login"]) && isset($_GET["logout"]) && !isset($_SESSION['reauth'])
) {
    header('WWW-Authenticate: Basic Realm="Login please"');
    header('HTTP/1.0 401 Unauthorized');
    $_SESSION['auth'] = true;
    $_SESSION['reauth'] = true;
    echo "Login now or forever hold your clicks...";
    exit;
}
$_SESSION['reauth'] = null;
?>
<h1>you have <? echo ($authorized) ? (isset($_GET["login"]) && isset($_GET["logout"]) ? 're' : '') : 'not '; ?>logged!</h1>


<?php
// ***************************************************************
// ***************************************************************
// ***************************************************************
// ***************************************************************
// ***************************************************************
// ***************************************************************
?>