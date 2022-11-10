<?php
echo "<br>";
session_start();

echo "Acceso autorizado para: " .  $_SESSION["UsuarioCorrecto"];
echo "<br>";
echo "Contraseña actual: " . $_SESSION["ContraseñaCorrecta"];
echo "<br>";
echo session_id();

if (!(isset($_SESSION["UsuarioCorrecto"]) || isset($_SESSION["ContraseñaCorrecta"]))) {
    unset($_SESSION["UsuarioCorrecto"]);
    unset($_SESSION["ContraseñaCorrecta"]);
    session_destroy();
    header("location:UsuarioHeader.php");
    die();
}
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
    <form action="UsuarioHeader.php" method="POST">
        <input type="submit" value="CERRAR SESION" name="cerrar" />
    </form>
</body>

<?php
if (isset($_REQUEST['cerrar'])) {
    session_destroy();
    unset($_SESSION["UsuarioCorrecto"]);
    unset($_SESSION["ContraseñaCorrecta"]);
    session_destroy();
    header("location:UsuarioHeader.php");
    die();
}
?>

</html>