<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito sesiones</title>
</head>

<body>

    <?php
    // SANDÍAS
    if (!isset($_REQUEST["sandias"])) {
        $_REQUEST["sandias"] = 0;
        $_REQUEST["cantidad"] = 0;
        $total = $_REQUEST["cantidad"] + $_REQUEST["sandias"];
    } else {
        $total = $_REQUEST["cantidad"] + $_REQUEST["sandias"];
    }
    ?>

    <form action="CarritoSesiones2.php" method="post">
        <!-- SANDIAS -->
        <p>
            <label for="cantidad">Sandías:</label>
            <input type="number" name="cantidad" value="0">
            <input type="text" name="sandias" value="<?php echo $total; ?>">
            <input type="submit" name="añadir" value="Añadir">
        </p>
    </form>
    <br>
    <a href="CarritoSesiones3.php"><button>Cesta</button></a>

    <?php
    $_SESSION['cantidad'] = $total;

    $fichero = fopen("carrito.txt", 'a');

    if (isset($_REQUEST['añadir'])) {
        $cantidad = $_REQUEST['cantidad'];
        fputs($fichero, "$cantidad sandías\n");
    }
    fclose($fichero);
    ?>
</body>

</html>