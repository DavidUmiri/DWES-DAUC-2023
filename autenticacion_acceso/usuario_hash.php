<?php

include 'include.php';

$usuario_nuevo = $_REQUEST['usuario_nuevo'];
$contraseña_nueva = $_REQUEST['contraseña_nueva'];

// ************************************************************

// $md5 = md5($contraseña_nueva);
// $sql = "INSERT INTO login VALUES(";
// $sql .= "'" . $usuario_nuevo . "', '" . $md5 . "')";

// ************************************************************

// $crypt = crypt($contraseña_nueva, "abcdefghijklmnñopqrstuvwxyz");
// $sql = "INSERT INTO login VALUES(";
// $sql .= "'" . $usuario_nuevo . "', '" . $crypt . "')";

// ************************************************************

$passwordHash = password_hash($contraseña_nueva, PASSWORD_DEFAULT, [15]);
$sql = "INSERT INTO login VALUES(";
$sql .= "'" . $usuario_nuevo . "', '" . $passwordHash . "')";

// ************************************************************

if ($conexion->query($sql)) {
    $_SESSION['resultado'] = true;
} else {
    $_SESSION['resultado'] = false;
}

header("Location: crear_usuario.php");
