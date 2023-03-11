<?php
require_once('config.php');

// inicia la sesión
session_start();

// verifica si existe la sesión carrito, de lo contrario, crea una
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

// verifica si se ha enviado un formulario para agregar productos
if (isset($_POST['producto']) && isset($_POST['cantidad'])) {
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];

    // comprueba que los campos no estén vacíos
    if ($producto !== "" && $cantidad !== "") {
        // agrega el producto al carrito
        if (isset($_SESSION['carrito'][$producto])) {
            $_SESSION['carrito'][$producto] += $cantidad;
        } else {
            $_SESSION['carrito'][$producto] = $cantidad;
        }
    } else {
        echo "<p>Producto o cantidad vacíos</p>";
    }
}


// crea una instancia de Smarty y asigna las variables necesarias
$smarty = new Smarty();
$smarty->assign('carrito', $_SESSION['carrito']);

// muestra el contenido del carrito
if (!empty($_SESSION['carrito'])) {
    $smarty->display('carrito.tpl');
}

// muestra un formulario para agregar productos al carrito
$smarty->display('formulario.tpl');

// boton para cerrar la sesión
if (isset($_POST['cerrar'])) {
    session_unset();
    session_destroy();
    header('Location: carrito.php');
}
