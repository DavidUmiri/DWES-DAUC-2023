<?php
include("BBDDMiniAppInclude.php");
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PEDIDO</title>
</head>

<body align=center>

    <br><br><br>
    <h1>Pedido</h1>

    <!-- FORMULARIO -->
    <br>
    <form action="BBDDMiniAppPedido.php" method="POST">
        <p>
            Escriba la prenda: <input type="text" name="prenda">
        </p>
        <p>
            Cantidad: <input type="number" name="cantidad" min="0" max="100">
            <input type="submit" name="ingresar" value="Ingresar">
        </p>
    </form>
    <br>
    <a href="BBDDMiniAppModificar.php"><button name="atras">Atrás</button></a>
    <a href="BBDDMiniAppConfirmacion.php"><button name="siguiente">Siguiente</button></a>
    <br><br><br>

    <?php
    $pdo = new PDO("mysql:dbname=tienda;host=localhost", "david", "david");

    if (isset($_REQUEST['prenda'], $_REQUEST['cantidad'])) {
        $prenda = $_REQUEST['prenda'];
        $cantidad = $_REQUEST['cantidad'];
    } else {
        $prenda = "";
        $cantidad = 0;
    }

    // decrementar prenda
    if ($prenda != "") {
        if (isset($_REQUEST['ingresar'])) {
            $consulta = $pdo->query("UPDATE almacen set cantidad = cantidad - $cantidad where ropa = '$prenda';");
        }
    }

    // guardamos las variables
    $_SESSION['prenda'] = $prenda;
    $_SESSION['cantidad'] = $cantidad;
    ?>
</body>

</html>