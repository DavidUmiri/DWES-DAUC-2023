<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MODIFICAR</title>
</head>

<body>
    <h1>Modificar</h1>

    <!-- ANTERIOR -->
    <?php
    $pdo = new PDO("mysql:dbname=tienda;host=localhost", "david", "david");
    if ($consulta = $pdo->query("SELECT * from almacen;")) {
        echo "<i>Stock actual:</i> <br>";
        while ($registro = $consulta->fetch()) {
            echo "<i>" . $registro["ropa"] . ": " . $registro["cantidad"] . "</i>";
            echo "<br>";
        }
    } else {
        echo "Problema accediendo a la base de datos TIENDA.";
    }
    ?>

    <!-- FORMULARIO -->
    <form action="BBDDMiniAppModificar.php" method="POST">
        <p>Prendas:
            <select name="prenda">
                <option>pantalones</option>
                <option>sudaderas</option>
            </select>
        </p>
        <p>Añadir (+) / Quitar (-): <input type="number" name="cantidad"></p>
        <input type="submit" name="enviar" value="Enviar">
    </form>

    <!-- ACTUALIZO BBDD -->
    <?php
    if (isset($_REQUEST['prenda'], $_REQUEST['cantidad'])) {
        $prenda = $_REQUEST['prenda'];
        $cantidad = $_REQUEST['cantidad'];
    } else {
        $prenda = "";
        $cantidad = 0;
    }

    if (isset($_REQUEST['enviar'])) {
        $consulta = $pdo->query("UPDATE almacen set cantidad=cantidad + $cantidad where ropa='$prenda';");
        echo "<br><strong>Cambios realizados</strong><br>";
    }
    ?>

    <!-- MUESTRO BBDD ACTUALIZADO-->
    <?php
    if (isset($_REQUEST['enviar'])) {
        if ($consulta = $pdo->query("SELECT * from almacen;")) {

            while ($registro = $consulta->fetch()) {
                echo "<strong>" . $registro["ropa"] . ": " . $registro["cantidad"] . "</strong>";
                echo "<br>";
            }
        } else {
            echo "Problema accediendo a la base de datos TIENDA.";
        }
    }
    ?>
</body>

</html>