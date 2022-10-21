<?php
header('Content-Type: text/html; charset=UTF-8');
//Iniciar una nueva sesión o reanudar la existente.
session_start();
//Si existe la sesión "cliente", la guardamos en una variable.
if (isset($_SESSION['cliente'])) {
    $cliente = $_SESSION['cliente'];
} else {
    header('Location: UsuarioHeader.php'); //Aqui lo redireccionas al lugar que quieras.
    die();
}
