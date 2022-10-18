<?php
include('prueba.php');

$pdo = new PDO("mysql:host=localhost;dbname=tienda;", "gerente", "gerente");

if (!isset($_POST["nombre"])) {
    mostrar($pdo);
} else {
    $almacenar = 0;
    if ($consulta = $pdo->query("SELECT * from Tienda")) {
        while ($registro = $consulta->fetch()) {
            if ($_POST["nombre"] === $registro["ProductoTienda"]) {
                $almacenar = $registro["Stock"];
            }
        }
    } else {
        echo "Problema accediendo a la base de datos";
    }

    $nom = $_POST["nombre"];
    $stock = $almacenar - $_POST["stock"];
    if ($stock < 0) {
        echo "No se puede realizar la operacion.";
        mostrar($pdo);
    } else {
        $actualizar = $pdo->exec("UPDATE Tienda Set Stock='$stock' Where ProductoTienda LIKE '%$nom%'");
        mostrar($pdo);
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Realizar Pedido</title>
</head>

<body>

    <form action="realizarPedido.php" method="POST">
        <input type="text" name="nombre" placeholder="Introduce nombre producto" value="">
        <input type="number" name="stock" placeholder="Introduce cantidad" value="">
        <input type="submit" value="Enviar">
    </form>

    <p><a href="panelControl.php">Ir a la página inicial</a></p>
    <p><a href='cerrarSesion.php'>Cerrar Sesion</a></p>
</body>

</html>