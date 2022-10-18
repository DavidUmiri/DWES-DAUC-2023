<?php session_start();
$usuarioCorrecto = "angel";
$contraCorrecta = "1";

if (!(isset($_POST["usuario"]) && isset($_POST["contraseña"]))) {
    $_POST["usuario"] = "";
    $_POST["contraseña"] = "";
} else if ($_POST["usuario"] === $usuarioCorrecto && $_POST["contraseña"] === $contraCorrecta) {
    $_SESSION["user"] = $usuarioCorrecto;
    header("Location: panelControl.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Iniciar Sesión</title>
</head>

<body>

    <form action="iniciarSesion.php" method="POST">
        <input name="usuario" type="text" placeholder="Escribe tu nombre de usuario">
        <input name="contraseña" type="password" placeholder="Escribe tu contraseña">
        <input type="submit" value="Enviar">
    </form>

</body>

</html>