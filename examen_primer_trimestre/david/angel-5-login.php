<?php
session_start();
?>

<html>

<head>
    <meta charset="utf-8">
</head>

<body>

    <?php
    $contraseña = "5fc3beb0116cf3fed5146adbb27d86d9";
    $nombre = "angel";
    if ((isset($_POST["password"], $_POST["user"]) || isset($_SESSION["user"]))) {
        if (empty($_POST["password"])) {
            $_POST["password"] = " ";
        }


        if ((md5($_POST["password"]) == $contraseña && $nombre == $_POST["user"]) || isset($_SESSION["user"])) {
            //Mostrar solo si se ha facilitado ya usuario y contraseña correctos:
            $_SESSION["user"] = true;
            echo <<<FIN
    <a href=ejercicio5-1.php>Opción Uno</a>
    <a href=ejercicio5-2.php>Opción Dos</a>
    <a href="cerrarSesion.php">Cerrar sesión</a>
    FIN;
        } else {
            // Mostrar solo si no se ha facilitado ya usuario y contraseña correctos : y un botón o enlace de logout
            echo <<<FIN
    <form method=post>
    <label>Nombre:</label>
    <input type="text" name="user"/>
    <br>
    <label>Contraseña:</label>
    <input type="password" name="password"/>
    <br>
    <input type="submit" value="Login" />
    </form>
    usuario y/o contraseña incorrectos
    FIN;
        }
    } else {
        echo <<<FIN
    <form method=post>
    <label>Nombre:</label>
    <input type="text" name="user"/>
    <br>
    <label>Contraseña:</label>
    <input type="password" name="password"/>
    <br>
    <input type="submit" value="Login" />
    </form>
    FIN;
    }

    ?>
</body>

</html>