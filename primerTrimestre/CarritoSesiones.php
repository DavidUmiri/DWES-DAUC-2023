<?php
session_start();
$_SESSION['id'] = '98';
$_SESSION['contraseña'] = 'david';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito sesiones LOGIN</title>
</head>

<body>
    <form action="CarritoSesiones.php">
        <p>
            ID: <input type="text" name="id">
        </p>
        <p>
            CONTRASEÑA: <input type="password" name="contraseña">
        </p>
        <p>
            <input type="submit" name="enviar" value="ACCEDER">
        </p>
    </form>
</body>

<?php

if (!isset($_REQUEST['id'], $_REQUEST['contraseña'])) {
    $_REQUEST['id'] = "";
    $_REQUEST['contraseña'] = "";
} else {

    if ($_REQUEST['id'] === $_SESSION['id'] && $_REQUEST['contraseña'] === $_SESSION['contraseña']) {
        header("location: CarritoSesiones2.php");
    } else {
        echo "<script>alert('El usuario o contraseña son incorrectos.');</script>";
    }
}

?>

</html>