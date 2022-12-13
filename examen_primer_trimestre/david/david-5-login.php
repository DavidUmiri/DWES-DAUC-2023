<?php
session_start();
$usuario_correcto = "david";
$contraseña_correcta = "umiri";

// $hash = password_hash($contraseña_correcta, PASSWORD_DEFAULT);
?>

<html>

<head>
    <meta charset="utf-8">
</head>

<body>
    <!-- Mostrar solo si no se ha facilitado ya usuario y contraseña correctos:
-->
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

    <!-- Mostrar solo si se ha facilitado ya usuario y contraseña correctos:
-->
    <?php
    if (isset($_REQUEST["enviar"])) {

        /*
        if ($_REQUEST["user"] == $usuario_correcto && password_verify($_REQUEST["password"],$hash)) {
            echo "<a href=david-5-1.php>Opción Uno</a>";
            echo "<br>";
            echo "<a href=david-5-2.php>Opción Dos</a>";
            $_SESSION["iniciar"] = true;
        } else {
            echo "Contraseña o usuario incorrectos";
        }
        */

        if ($_REQUEST["user"] == $usuario_correcto && $_REQUEST["password"] == $contraseña_correcta) {
            echo "<a name='op1' href=david-5-1.php>Opción Uno</a>";
            echo "<br>";
            echo "<a href=>Opción Dos</a>";
            $_SESSION["iniciando"] = true;
            if (isset($_REQUEST["op1"])) { {
                    header("Location: david-5-2.php");
                }
            }
        } else if (isset($_REQUEST["cerrar"])) {
            session_unset($_SESSION["iniciando"]);
            session_destroy();
        } else {
            echo "Contraseña o usuario incorrectos";
        }
    }
    ?>

    <!-- y un botón o enlace de logout -->
    <br>

    <?php

    ?>
</body>

</html>