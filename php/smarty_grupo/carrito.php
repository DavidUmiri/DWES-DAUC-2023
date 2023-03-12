<?php

// Incluimos el archivo de configuración
require_once('config.php');

// Iniciamos la sesión
session_start();

// Verificamos si existe la sesión carrito, sino la creamos
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}

// Verificamos si se ha enviado un formulario para agregar productos
if (isset($_POST['producto']) && isset($_POST['cantidad'])) {
    // Obtenemos los datos del formulario
    $producto = $_POST['producto'];
    $cantidad = $_POST['cantidad'];
    // Verificamos que los campos no estén vacíos
    if ($producto !== "" && $cantidad !== "") {
        // Agregamos el producto al carrito
        if (isset($_SESSION['carrito'][$producto])) {
            // Si el producto ya existe en el carrito, sumamos la cantidad
            $_SESSION['carrito'][$producto] += $cantidad;
        } else {
            // Si no existe, lo agregamos al carrito
            $_SESSION['carrito'][$producto] = $cantidad;
        }
    } else {
        // Mostramos una alerta si algún campo está vacío
        echo "<script>alert('Producto o cantidad vacíos');</script>";
    }
}


// Creamos una instancia de Smarty y asignamos la variable
$smarty = new Smarty();
$smarty->assign('carrito', $_SESSION['carrito']);

// Mostramos un formulario para agregar productos al carrito
$smarty->display('formulario.tpl');

// Mostramos el contenido del carrito si no está vacío
if (!empty($_SESSION['carrito'])) {
    $smarty->display('carrito.tpl');
}

// Botón para cerrar la sesión
if (isset($_POST['cerrar'])) {
    // Limpiamos y destruimos la sesión
    session_unset();
    session_destroy();
    // Redirigimos a la página del carrito
    header('Location: carrito.php');
}
