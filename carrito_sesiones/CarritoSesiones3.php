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
    <a href="CarritoSesiones2.php"><button name="atras">Atrás</button></a>
    <br>
    <br>
    <a href="CarritoSesiones.php"><button name="cerrar">Cerrar sesión</button></a>
    <br><br>

    <?php
    // Leemos el fichero.
    $fichero = fopen("carrito.txt", 'r');
    while (!feof($fichero)) {
        $linea = fgets($fichero);
        echo "<br>" . $linea . "<br>";
    }
    fclose($fichero);
    ?>
</body>

</html>