<!-- Fichero que se añadira a todos los archivos, menos al primero -->

<?php
// iniciar sesion
session_start();

// acceso a base de datos tienda
$pdo = new PDO("mysql:dbname=tienda;host=localhost", "root", "");

// comprobacion para evitar que accedan directamente a mostrar.php
if (!isset($_SESSION["iniciar"])) {
    header("Location: BBDDMiniAppCerrar.php");
}
