<?php


?>

<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    <!-- Mostrar solo si no se ha facilitado ya usuario y contraseña correctos: -->
    <form method=post>
        <label>Nombre:</label>
        <input type="text" name="user" />
        <br>
        <label>Contraseña:</label>
        <input type="password" name="password" />
        <br>
        <input name="enviar" type="submit" value="Login" />
        <a><button name="cerrar">Cerrar cesion</button></a>
    </form>

    <!-- Mostrar solo si se ha facilitado ya usuario y contraseña correctos: -->
    <?php
    $usuario_correcto = "david";
    // echo password_hash("umiri", PASSWORD_DEFAULT) . "\n";
    $hash = '$2y$10$2VNp8XcciIDGvgabMSh/mOtUY5OTanrLiHjgbM3g8uh.W0mQ9zy3.';

    if (isset($_REQUEST["enviar"])) {
        if ($_REQUEST["user"] == $usuario_correcto && password_verify($_REQUEST["password"], $hash)) {
            session_start();
            $_SESSION["iniciar"] = true;
            echo "<a href=david-5-1.php>Opción Uno</a>";
            echo "<br>";
            echo "<a href=david-5-2.php>Opción Dos</a>";
        } else {
            echo "Contraseña o usuario incorrectos";
        }
    }

    ?>

    <!-- y un botón o enlace de logout -->

</body>

</html>