<?php

// Incluimos el archivo de configuración
require_once('config.php');

// Inicia la sesión
session_start();

// Verifica si se ha enviado el formulario de inicio de sesión
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $usuario = $_POST['usuario'];
    $contrasena = $_POST['contrasena'];

    // Comprueba las credenciales del usuario
    if ($usuario === 'david' && $contrasena === '1998') {

        // Establece la variable de sesión "usuario"
        $_SESSION['usuario'] = $usuario;

        // Redirige al usuario a la misma página autenticacion.php
        header('Location: autenticacion.php');
        exit();
    } else if ($usuario === '' && $contrasena === '') {
        echo "<h1>Introduce el usuario y la contraseña</h1>";
    } else {
        echo "<h1>Usuario o contraseña incorrectos</h1>";
    }
}

// Crea una instancia de Smarty
$smarty = new Smarty();

// Definimos la variable $formulario
$formulario = false;

// Verifica si el usuario ya ha iniciado sesión
if (isset($_SESSION['usuario'])) {

    // Muestra el usuario y la contraseña del usuario
    $usuario = $_SESSION['usuario'];
    $contrasena = '1998';
    $smarty->assign('usuario', $usuario);
    $smarty->assign('contrasena', $contrasena);

    // Agrega un formulario de eliminación de sesión
    $smarty->assign('cerrar', true);

    // Procesa el formulario de eliminación de sesión
    if (isset($_POST['cerrar'])) {

        // Borra la variable de sesión "usuario"
        unset($_SESSION['usuario']);

        // Redirige al usuario a la misma página autenticacion.php
        header('Location: autenticacion.php');
        exit();
    }
} else {
    // Si el usuario no ha iniciado sesión, muestra el formulario de inicio de sesión
    $formulario = true;
}

// Asignamos la variable $formulario a la plantilla
$smarty->assign('formulario', $formulario);

// Renderiza la plantilla
$smarty->display('autenticacion.tpl');
