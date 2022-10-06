<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    if (!isset($_REQUEST["platanos"])) {
        $_REQUEST["platanos"] = 0;
        $_REQUEST["compras1"] = 0;
        $total = $_REQUEST["compras1"] + $_REQUEST["platanos"];
    } else {
        $total = $_REQUEST["compras1"] + $_REQUEST["platanos"];
    }
    ?>

    <form action="CarritoCompra.php" method="post">
        <fieldset>
            <legend>Carrito compra</legend>
            <label for="compras1">Plátanos</label>
            <select name="compras1">
                <option value="0">0</option>
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="-1">-1</option>
                <option value="-2">-2</option>
            </select>

            <input type="text" name="platanos" placeholder="0" value="<?php echo "$total"; ?>">
            <input type="submit" name="submit" value="Enviar">
    </form>

</body>

</html>