<?php
session_start();
if (!isset($_SESSION["iniciar"])) {
    session_destroy();
    header("Location: david-5-login.php");
}
?>

<html>

<head>
    <meta charset="utf-8">
</head>

<body>

    <!-- Si no ha sido validado el usuario y la contraseña deberá redirigir al login -->

    <form action="david-5-login.php" method=post>
        <input type="submit" value="Inicio" name="inicio">
    </form>

</body>

</html>