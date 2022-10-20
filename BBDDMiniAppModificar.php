<?php
include("BBDDMiniAppInclude.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODIFICAR</title>
</head>

<body align=center>

    <br><br><br>
    <h1>Modificar</h1>

    <!-- STOCK -->
    <?php
    if ($consulta = $pdo->query("SELECT * from almacen;")) {
        echo "<strong>Stock:</strong><br>";

        while ($registro = $consulta->fetch()) {
            echo "<strong>" . $registro["ropa"] . ": " . $registro["cantidad"] . "</strong>";
            echo "<br>";
        }
    } else {
        echo "Problema accediendo a la base de datos TIENDA.";
    }
    ?>

    <!-- FORMULARIO -->
    <br>
    <form action="BBDDMiniAppModificar.php" method="POST">
        <p>
            Seleccionar prenda: <input type="text" name="prenda">
        </p>
        <p>
            Nueva prenda: <input type="text" name="nuevaPrenda">
        </p>
        <p>
            Eliminar prenda: <input type="text" name="eliminarPrenda">
        </p>
        <p>
            Cantidad: <input type="number" name="cantidad" min="0" max="9999">
            <input type="submit" name="ingresar" value="Ingresar">
        </p>
    </form>
    <br>
    <a href="BBDDMiniAppMostrar.php"><button>Atrás</button></a>
    <a href="BBDDMiniAppMenu.php"><button>Menú</button></a>
    <a href="BBDDMiniAppPedido.php"><button>Siguiente</button></a>
    <br><br><br>

    <!-- ACTUALIZAR STOCK -->
    <?php
    if (isset($_REQUEST['prenda'], $_REQUEST['nuevaPrenda'], $_REQUEST['eliminarPrenda'], $_REQUEST['cantidad'])) {
        $prenda = $_REQUEST['prenda'];
        $nuevaPrenda = $_REQUEST['nuevaPrenda'];
        $eliminarPrenda = $_REQUEST['eliminarPrenda'];
        $cantidad = $_REQUEST['cantidad'];
    } else {
        $prenda = "";
        $nuevaPrenda = "";
        $eliminarPrenda = "";
        $cantidad = 0;
    }

    // incrementar prenda
    if ($prenda != "") {
        if (isset($_REQUEST['ingresar'])) {
            $consulta = $pdo->query("UPDATE almacen set cantidad = cantidad + $cantidad where ropa = '$prenda';");
        }
    }

    // nueva prenda
    if ($nuevaPrenda != "") {
        if (isset($_REQUEST['ingresar'])) {
            $consulta = $pdo->query("INSERT into almacen (ropa,cantidad) values ('$nuevaPrenda', $cantidad);");
        }
    }

    // eliminar prenda
    if ($eliminarPrenda != "") {
        if (isset($_REQUEST['ingresar'])) {
            $consulta = $pdo->query("DELETE from almacen where ropa='$eliminarPrenda';");
        }
    }
    ?>

    <!-- MOSTRAR STOCK ACTUALIZADO -->
    <?php
    if (isset($_REQUEST['ingresar'])) {
        if ($consulta = $pdo->query("SELECT * from almacen;")) {
            echo "<i>Stock actualizado:</i><br>";

            while ($registro = $consulta->fetch()) {
                echo "<i>" . $registro["ropa"] . ": " . $registro["cantidad"] . "</i>";
                echo "<br>";
            }
        } else {
            echo "Problema accediendo a la base de datos TIENDA.";
        }
    }
    ?>

</body>

</html>