<?php
session_start();

// PDO
$conexion = new PDO("mysql:dbname=login;host=localhost", "root", "");

$acentos = $conexion->query("SET NAMES 'utf8'");

// OTRA FORMA DE CONECTARSE A LA BBDD
// define("HOST_DB", "localhost");
// define("USER_DB", "root");
// define("PASS_DB", "");
// define("NAME_DB", "login");

// $conexion = new mysqli(
//     constant("HOST_DB"),
//     constant("USER_DB"),
//     constant("PASS_DB"),
//     constant("NAME_DB")
// );


// comprobacion
if (!isset($_SESSION["iniciar"])) {
    header("Location: cerrar_sesion.php");
}
