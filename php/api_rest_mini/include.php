<!-- Fichero que se añadira a todos los archivos, menos al primero, para que funcionen correctamente -->

<?php
// iniciar sesion
session_start();

// acceso a base de datos tienda
$pdo = new PDO("mysql:dbname=tienda;host=localhost", "root", "");

// comprobacion para evitar que accedan directamente
if (!isset($_SESSION["iniciar"])) {
    header("Location: cerrar_sesion.php");
}
