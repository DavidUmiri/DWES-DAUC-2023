<?php
include("BBDDMiniAppInclude.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CONFIRMACION</title>
</head>

<body align=center>

    <br><br><br>
    <h1>Confirmación</h1>
    <br>

    <?php
    if (!(isset($_SESSION['cantidad'], $_SESSION['prenda']))) {
        $_SESSION['cantidad'] = 0;
        $_SESSION['prenda'] = "";
    }

    echo "<strong>Usted ha solicitado " . $_SESSION['cantidad'] . " " . $_SESSION['prenda'] . "</strong>";
    echo "<br><br><br>";


    // MUESTRO STOCK
    if ($consulta = $pdo->query("SELECT * from almacen;")) {
        echo "<i>Stock actualizado:</i><br>";

        while ($registro = $consulta->fetch()) {
            echo "<i>" . $registro["ropa"] . ": " . $registro["cantidad"] . "</i>";
            echo "<br>";
        }
    } else {
        echo "Problema accediendo a la base de datos TIENDA.";
    }
    ?>

    <br><br>
    <a href="BBDDMiniAppPedido.php"><button>Atrás</button></a>
    <a href="BBDDMiniAppMenu.php"><button>Menú</button></a>
    <a href="BBDDMiniAppCerrar.php"><button>Cerrar sesión</button></a>

</body>

</html>