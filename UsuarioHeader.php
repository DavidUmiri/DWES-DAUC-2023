<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Usuario con header location</title>
</head>

<body>
    <br>
    <form action="UsuarioHeader.php" method=POST>
        <input name="Usuario" type="text" placeholder="Escribe tu usuario">
        <input name="Contraseña" type="text" placeholder="Escribe tu contraseña">
        <input type="submit" value="Enviar">
    </form>

    <?php
    $_SESSION["UsuarioCorrecto"] = "david";
    $_SESSION["ContraseñaCorrecta"] = "1998";

    if (isset($_REQUEST["Usuario"], $_REQUEST["Contraseña"])) {

        if ($_REQUEST["Usuario"] === $_SESSION["UsuarioCorrecto"] && $_SESSION["ContraseñaCorrecta"] === $_REQUEST["Contraseña"]) {
            header("location: UsuarioHeader2.php");
        } else {
            echo "<br>";
            echo "Usuario o contraseña incorrectos.";
        }
    }
    ?>

</body>

</html>