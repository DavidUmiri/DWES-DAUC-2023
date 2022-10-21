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
            Cantidad: <input type="number" name="cantidad" min="0">
            <input type="submit" name="ingresar" value="Ingresar">
        </p>
    </form>
    <br>
    <a href="BBDDMiniAppModificar.php"><button>Atrás</button></a>
    <a href="BBDDMiniAppMenu.php"><button>Menú</button></a>
    <a href="BBDDMiniAppConfirmacion.php"><button>Siguiente</button></a>
    <br><br><br>

    <?php
    if (isset($_REQUEST['prenda'], $_REQUEST['cantidad'])) {
        $prenda = $_REQUEST['prenda'];
        $cantidad = $_REQUEST['cantidad'];
    } else {
        $prenda = "";
        $cantidad = 0;
    }

    // disminuir prenda
    if ($prenda != "") {

        if (isset($_REQUEST['ingresar'])) {

            $update = "UPDATE almacen set cantidad = cantidad - $cantidad where ropa = '$prenda' and cantidad >= $cantidad;";
            $resultado = $pdo->query($update);

            // rowCount() devuelve el numero de filas agregadas, eliminadas o cambiadas en la última instrucción
            if ($resultado != null && $resultado->rowCount() > 0) {
                print "Se ha realizado el pedido";
            } else {
                print "No hay $prenda suficientes";
            }
        }
    }

    // guardamos las variables
    $_SESSION['prenda'] = $prenda;
    $_SESSION['cantidad'] = $cantidad;
    ?>

</body>

</html>