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
        <input type="submit" value="Enviar" name="enviar">
    </form>

    <?php
    $usuarioCorrecto = "david";
    $contraseñaCorrecta = "1998";

    if (isset($_REQUEST["enviar"])) {

        if ($_REQUEST["Usuario"] == $usuarioCorrecto && $_REQUEST["Contraseña"] == $contraseñaCorrecta) {
            $_SESSION["sesionIniciada"] = true;
            header("Location: UsuarioHeader2.php");
        } else {
            echo "<br>";
            echo "Usuario o contraseña incorrectos.";
        }
    }
    ?>

</body>

</html>