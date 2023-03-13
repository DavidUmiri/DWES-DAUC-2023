{* Tabla producto cantidad *}
<h1>Carrito de compras</h1>
<table border="1">
    <tr>
        <th>Producto</th>
        <th>Cantidad</th>
    </tr>
    {foreach $carrito as $producto => $cantidad}
        <tr>
            <td>{$producto}</td>
            <td>{$cantidad}</td>
        </tr>
    {/foreach}
</table>