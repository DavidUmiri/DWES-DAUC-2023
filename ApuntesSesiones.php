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
