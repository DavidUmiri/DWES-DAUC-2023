<?php

require_once 'conexion.php';
session_start();

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];

// 
$passwordHash = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO login VALUES(";
$sql .= "'" . $username . "', '" . $passwordHash . "')";

if ($pdo->query($sql)) {
    $_SESSION['resultado'] = true;
} else {
    $_SESSION['resultado'] = false;
}

header("Location: index.php");
