<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INICIO</title>
</head>

<body align=center>

    <br><br><br><br><br>
    <h1>Autenticación</h1>

    <!-- Formulario -->
    <form action="BBDDMiniAppAutenticacion.php" method="POST">
        <p>Usuario:</p>
        <input type="text" name="usuario">
        <br>
        <p>Contraseña:</p>
        <input type="password" name="contraseña">
        <br><br>
        <input type="submit" name="acceder" value="Registrar">
    </form>


    <?php
    session_start();
    $pdo = new PDO("mysql:dbname=login;host=localhost", "david", "david");

    if (isset($_REQUEST["usuario"], $_REQUEST["contraseña"])) {
        $usuario = $_REQUEST['usuario'];
        $contraseña = $_REQUEST['contraseña'];
    } else {
        $_REQUEST["usuario"] = "";
        $_REQUEST["contraseña"] = "";
    }

    if (isset($_REQUEST["acceder"])) {
        $passwordHash = password_hash($contraseña, PASSWORD_DEFAULT);

        $sql = "INSERT INTO login VALUES(";
        $sql .= "'" . $usuario . "', '" . $passwordHash . "')";
    }


    ?>



</body>

</html>