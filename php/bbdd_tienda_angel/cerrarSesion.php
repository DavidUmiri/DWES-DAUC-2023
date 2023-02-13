<?php
include('prueba.php');
session_destroy();

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Cerrar Sesion</title>
</head>

<body>
    <h2>Has Cerrado Sesion correctamente</h2>
    <br />
    <p><a href="iniciarSesion.php">Ir al Login</a></p>
</body>

</html>