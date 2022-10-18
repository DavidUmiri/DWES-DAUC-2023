<?php
include('prueba.php');

$pdo = new PDO("mysql:dbname=tienda;host=localhost", "gerente", "gerente");
mostrar($pdo);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <title>Panel Control</title>
</head>

<body>
    <h2>Sesion creada correctamente</h2>
    <p>
    </p>
    <br>
    <p><a href='modificarStock.php'>Modificar stock</a></p>
    <p><a href='realizarPedido.php'>Realizar pedido</a></p>
    <p><a href='cerrarSesion.php'>Cerrar Sesion</a></p>


</body>

</html>