<?php
session_start();
echo "Total de sandías: " . $_SESSION['cantidad'] . " unidades";
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Total carrito</title>
</head>

<body>
    <br>
    <br>
    <a href="CarritoSesiones2.php"><button>Atrás</button></a>
    <br>
    <br>
    <a href="CarritoSesiones.php"><button name="cerrar">Cerrar sesión</button></a>

    <?php
    if (!isset($_REQUEST['cerrar'])) {
        session_destroy();
    }

    // Eliminar fichero.
    $fichero = fopen("FicheroFrutas.txt", 'a');

    if (unlink('FicheroFrutas.txt')) {
        // Eliminado.
    } else {
        // Hubo problemas.
    }
    ?>
</body>

</html>