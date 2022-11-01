<?php
session_start();

$usuario = "usuario";
$contraseña = "contraseña";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INICIO</title>
</head>

<body align=center>

    <br><br><br><br><br>
    <h1>Autenticación</h1>

    <!-- Formulario -->
    <form action="autenticacion.php" method="POST">
        <p>Usuario:</p>
        <input type="text" name="usuario">
        <br>
        <p>Contraseña:</p>
        <input type="password" name="contraseña">
        <br><br>
        <input type="submit" name="acceder" value="Acceder">
    </form>

    <?php
    if (isset($_REQUEST["acceder"])) {
        if ($_REQUEST["usuario"] === $usuario && $_REQUEST["contraseña"] === $contraseña) {
            // creo esta variable booleana para usarla luego como comprobacion
            $_SESSION["iniciar"] = true;
            header("Location: crear_usuario.php");
        } else {
            echo "<br>";
            echo " <i>Usuario o contraseña incorrectos</i>";
        }
    }
    ?>
</body>

</html>