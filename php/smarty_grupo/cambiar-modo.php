<?php

require_once('config.php');

session_start();

// Inicializa la variable de sesión 'tema' si no existe
if (!isset($_SESSION['tema'])) {
    $_SESSION['tema'] = 'light';
}

// Verifica si el usuario ha hecho clic en el botón de cambio de tema
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['cambiarTema'])) {

    // Cambia el valor del tema
    if ($_SESSION['tema'] === 'light') {
        $_SESSION['tema'] = 'dark';
    } else {
        $_SESSION['tema'] = 'light';
    }
}

// Creamos una instancia de Smarty y asignamos la variable
$smarty = new Smarty();
$smarty->assign('tema', $_SESSION['tema']);

// Mostramos un formulario para agregar productos al carrito
$smarty->display('plantilla.tpl');
