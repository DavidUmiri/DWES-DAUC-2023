<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito compra 2</title>
</head>

<body>

    <?php
    // SANDÍAS
    if (!isset($_REQUEST["sandias"])) {
        $_REQUEST["sandias"] = 0;
        $_REQUEST["compras1"] = 0;
        $total = $_REQUEST["compras1"] + $_REQUEST["sandias"];
    } else {
        $total = $_REQUEST["compras1"] + $_REQUEST["sandias"];
    }
    // FRESAS
    if (!isset($_REQUEST["fresas"])) {
        $_REQUEST["fresas"] = 0;
        $_REQUEST["compras2"] = 0;
        $total2 = $_REQUEST["compras2"] + $_REQUEST["fresas"];
    } else {
        $total2 = $_REQUEST["compras2"] + $_REQUEST["fresas"];
    }
    // CHIRIMOYAS
    if (!isset($_REQUEST["chirimoyas"])) {
        $_REQUEST["chirimoyas"] = 0;
        $_REQUEST["compras3"] = 0;
        $total3 = $_REQUEST["compras3"] + $_REQUEST["chirimoyas"];
    } else {
        $total3 = $_REQUEST["compras3"] + $_REQUEST["chirimoyas"];
    }
    // TOTAL COMPRA
    if (!isset($_REQUEST["totalCompra"])) {
        $_REQUEST["totalCompra"] = 0;
        $totalCompra = $total + $total2 + $total3;
    } else {
        $totalCompra = $total + $total2 + $total3;
    }
    ?>

    <br>

    <form action="CarritoCompra2.php" method="post">
        <!-- SANDIAS -->
        <p>
            <label for="compras1">Sandías:</label>
            <input type="number" name="compras1" value="0" step="0.1">
            <input type="text" name="sandias" value="<?php echo $total; ?> ">
        </p>
        <!-- FRESAS -->
        <p>
            <label for="compras2">Fresas:</label>
            <input type="number" name="compras2" value="0" step="0.1">
            <input type="text" name="fresas" value="<?php echo $total2; ?>">
        </p>
        <!-- CHIRIMOYAS -->
        <p>
            <label for="compras3">Chirimoyas:</label>
            <input type="number" name="compras3" value="0" step="0.1">
            <input type="text" name="chirimoyas" value="<?php echo $total3; ?>">
        </p>
        <input type="submit" value="Añadir">
        <!-- TOTAL COMPRA -->
        <p>

            <label for="totalCompra">TOTAL COMPRA:</label>
            <input type="text" name="totalCompra" value="<?php echo $totalCompra; ?>">
        </p>
    </form>

</body>

</html>