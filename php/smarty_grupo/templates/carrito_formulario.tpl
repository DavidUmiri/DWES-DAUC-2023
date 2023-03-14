<!DOCTYPE html>
<html>

<head>
    <title>Producto cantidad</title>
    <link rel="stylesheet" href="css/carrito.css">
</head>

<body>

    {* Formulario producto cantidad *}
    <h1>Agregar productos</h1>

    <form method="post">
        <label for="producto">Producto:</label>
        <input type="text" name="producto" autofocus><br><br>
        <label for="cantidad">Cantidad:</label>
        <input type="number" name="cantidad"><br><br>
        <input type="submit" value="Agregar">
        <button type="submit" name="cerrar">Borrar carrito</button>
    </form>

</body>

</html>