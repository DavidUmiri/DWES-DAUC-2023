<?php
include("BBDDMiniAppInclude.php");
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar</title>
</head>

<body align=center>

    <br><br><br>
    <h1>Mostrar</h1>

    <?php
    // query ejecuta una sentencia SQL devolviendo el conjunto de resultados (si los hay)
    if ($consulta = $pdo->query("SELECT * from almacen")) {

        // fetch obtiene una fila de un conjunto de resultados
        while ($registro = $consulta->fetch()) {
            echo "<strong>" . $registro["ropa"] . ": " . $registro["cantidad"] . "</strong>";
            echo "<br>";
        }
    } else {
        echo "Problema accediendo a la base de datos TIENDA.";
    }
    ?>

    <br><br>
    <a href="BBDDMiniAppMenu.php"><button>Atrás</button></a>
    <a href="BBDDMiniAppModificar.php"><button>Siguiente</button></a>

</body>

</html>