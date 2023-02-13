<?php
session_start();

if (!isset($_SESSION["sesionIniciada"])) {
    header("Location: UsuarioHeader.php");
} else {
    echo session_id();
}

?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
</head>

<body>
    <form action="" method="POST">
        <input type="submit" name="cerrar" value="cerrar cesion">
    </form>

    <?php
    if (isset($_REQUEST["cerrar"])) {
        session_destroy();
        header("Location: UsuarioHeader.php");
    }
    ?>
</body>

</html>