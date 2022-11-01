<?php
include "include.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear usuario</title>
</head>

<body>

    <?php
    if (isset($_SESSION['resultado'])) {
        if ($_SESSION['resultado']) {
            echo "<p>Usuario creado correctamente</p>";
        } else {
            echo "<p>Hubo un problema al crear el usuario</p>";
        }
        unset($_SESSION['resultado']);
    }
    ?>

    <form action="usuario_hash.php" method="post">
        <h1>Crear usuario</h1>
        <label for="usuario_nuevo">Usuario nuevo</label>
        <input type="text" name="usuario_nuevo" id="usuario_nuevo">
        <label for="contraseña_nueva">Contraseña nueva</label>
        <input type="password" name="contraseña_nueva" id="contraseña_nueva">
        <input type="submit" value="Crear usuario">
    </form>

    <br><br>
    <a href="cerrar_sesion.php"><button>Cerrar cesión</button></a>
</body>

</html>