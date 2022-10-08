<?php

// Iniciar sesión.
session_start();

// Iniciar las variables de sesión.
$_SESSION['id'] = '98';
$_SESSION['nombre'] = 'david';

// Mostrar las variables de sesión.
echo $_SESSION['id'];
echo $_SESSION['nombre'];

// Autorizar a un usuario.
if (isset($_SESSION['nombre'])) {
    echo "Usuario autorizado.";
} else {
    echo "Acceso no autorizado.";
}

// Registrar una variable.
if (!isset($_SESSION['count'])) {
    $_SESSION['count'] = 0;
} else {
    ++$_SESSION['count'];
}
echo $_SESSION['count'];

// Borrar una variable.
unset($_SESSION['count']);

// Destruir una sesión.
session_destroy();

// Volver a otro sitio.
header('location: ruta/');

// Metodos de prevencion contra un ataque.
// Utilizar únicamente cookies para la propagación del identificador de sesión.
ini_set('session.use_only_cookies', 1);

// Regenerar los identificadores de sesión para sesiones nuevas poniendo una marca en las sesiones.
session_start();

if (isset($_SESSION['mark']) === false) {
    session_regenerate_id(true);
    $_SESSION['mark'] = true;
}

// Cambiar el identificador de sesión siempre que un usuario cambie su estado (autenticado, registrado, ...).
if ($user_logged_in === true) {
    session_regenerate_id(true);
    $_SESSION['logged'] = true;
}

// Aviso: es muy importante que sea session_regenerate_id(true); y no session_regenerate_id(); ya que si no eliminamos la sesión antigua, estamos haciendo más fácil los ataques contra la página web al dejar múltiples sesiones válidas abiertas en el servidor.