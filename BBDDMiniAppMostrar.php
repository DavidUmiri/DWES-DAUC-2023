<?php


?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TIENDA</title>
</head>

<body>

    <?php
    echo "<h1>Almacén</h1>";
    $pdo = new PDO("mysql:dbname=tienda;host=localhost", "david", "david");

    if ($consulta = $pdo->query("SELECT * from almacen")) {

        while ($registro = $consulta->fetch()) {
            echo $registro["ropa"] . ": " . $registro["cantidad"];
            echo "<br>";
        }
    } else {
        echo "Problema accediendo a la base de datos TIENDA.";
    }
    ?>

    <p><button><a href="BBDDMiniAppModificar.php">Modificar</a></button></p>

</body>

</html>