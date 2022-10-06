<?php
echo "<br>";
session_start();
echo "Acceso autorizado para: " .  $_SESSION["UsuarioCorrecto"];
echo "<br>";
echo "Contraseña actual: " . $_SESSION["ContraseñaCorrecta"];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>

<body>
    <br>
    <br>
    <form action="UsuarioHeader.php">
        <input type="submit" value="VOLVER" />
    </form>
    <form action="UsuarioHeader3.php">
        <input type="submit" value="CONTINUAR" />
    </form>
</body>

</html>

<?php
session_destroy();
?>