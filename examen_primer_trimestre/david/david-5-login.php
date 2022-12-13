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
    $conexion = new PDO("mysql:dbname=login;host=localhost", "root", "");
    $acentos = $conexion->query("SET NAMES 'utf8'");



    // $usuario_correcto = "david";
    // $contraseña_correcta = "umiri";
    // $correcta_hasheada = password_hash($contraseña_correcta, PASSWORD_BCRYPT, ["cost" => 11]);

    if (!isset($_REQUEST["password"])) {
        $_REQUEST["password"] = "";
    }

    $contraseña_introducida = $_REQUEST["password"];
    $contraseña_introducida_hasheada = password_hash($contraseña_introducida, PASSWORD_BCRYPT, ["cost" => 11]);

    if (isset($_REQUEST["enviar"])) {

        $query = "SELECT * FROM login WHERE username = '" . $_REQUEST["user"] . "' AND password = '" . $_REQUEST["password"] . "'";
        $validando = $conexion->query($query);

        if ($validando->rowCount() > 0) {

            echo "El usuario y contraseña ya se encuentran registrados<br>";
            session_start();
            $_SESSION["iniciar"] = true;
            echo "<a href=david-5-1.php>Opción Uno</a>";
            echo "<br>";
            echo "<a href=david-5-2.php>Opción Dos</a>";

            // if ($_REQUEST["user"] == $usuario_correcto && password_verify($contraseña_correcta, $contraseña_introducida_hasheada)) {
            // } 

        } else {
            echo "Contraseña o usuario incorrectos";
        }
    }
    ?>

    <!-- y un botón o enlace de logout -->

</body>

</html>