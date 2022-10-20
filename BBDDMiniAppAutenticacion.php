<?php
// inicio la sesion para utilizar una variable mas abajo
session_start();

// creo las variables locales de comprobacion
$usuario = "david";
$contraseña = "david";
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
    <form action="BBDDMiniAppAutenticacion.php" method="POST">
        <p>Usuario:</p>
        <input type="text" name="usuario">
        <br>
        <p>Contraseña:</p>
        <input type="password" name="contraseña">
        <br><br>
        <input type="submit" name="acceder" value="Acceder">
    </form>

    <?php
    // si pulso el boton acceder hago la comprobacion
    if (isset($_REQUEST["acceder"])) {
        // comprobacion de usuario/contraseña correcto con usuario/contraseña introducido
        if ($_REQUEST["usuario"] === $usuario && $_REQUEST["contraseña"] === $contraseña) {
            // creo esta variable booleana para usarla luego como comprobacion
            $_SESSION["iniciar"] = true;
            // al ser correcto lo mando al menu
            header("Location: BBDDMiniAppMenu.php");
        } else {
            // si es incorrecto se lo indico
            echo "<br>";
            echo " <i>Usuario o contraseña incorrectos</i>";
        }
    }
    ?>
</body>

</html>