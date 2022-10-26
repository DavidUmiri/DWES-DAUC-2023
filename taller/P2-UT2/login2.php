<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario Login</title>
</head>

<body>


    <?php
    if (!array_key_exists("usuario", $_POST)) {
        $_POST["usuario"] = "";
        $_POST["password"] = "";
    }
    ?>
    <h1>Bienvenido a la fortaleza de la soledad</h1>

    <br>
    <h2>Introduce un usuario y una contraseña correctos</h2>
    <br>
    <form action="login2.php" method="post">
        <input type="text" name="usuario" required placeholder="Usuario">
        <br>
        <input type="password" name="password" requierd placeholder="Contraseña">
        <br>
        <input type="submit" name="enviar">
        <br>
        <input type="reset" value="Borrar">
        <br>
        <button onClick="window.location.reload();">Actualizar</button>
    </form>


    <?php

    if ($_POST["usuario"] == "valen" && $_POST["password"] == "1234Abc@") {
        $_SESSION["usuario"] = $_POST["usuario"];

        $_SESSION["password"] = $_POST["password"];

        echo "Credenciales correctas <br>";
        echo "Elija dónde quiera acceder <br>";


        header('Location: mostrarstock.php');
    } else {

        echo "<a href='http://localhost/JuegosMesa/login2.php'>";
    }



    ?>
</body>

</html>