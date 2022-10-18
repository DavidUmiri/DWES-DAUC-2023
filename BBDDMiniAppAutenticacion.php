<?php
session_start();

$usuario = "david";
$contraseña = "david";

if (isset($_REQUEST["acceder"])) {

    if ($_REQUEST["usuario"] === $usuario && $_REQUEST["contraseña"] === $contraseña) {
        $_SESSION["iniciar"] = true; // creo esta variable para usarla luego como comprobacion
        header("Location: BBDDMiniAppMostrar.php");
    } else {
        echo "<br>";
        echo "<i>Usuario o contraseña incorrectos.</i>";
    }
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INICIO</title>
</head>

<body>

    <h1>Autenticación</h1>

    <form action="BBDDMiniAppAutenticacion.php" method="POST">
        Usuario: <input type="text" name="usuario">
        <br><br>
        Contraseña: <input type="password" name="contraseña">
        <br><br>
        <input type="submit" name="acceder" value="Acceder">
    </form>

</body>

</html>