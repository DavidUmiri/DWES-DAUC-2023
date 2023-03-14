<?php
/* Smarty version 4.3.0, created on 2023-03-14 15:55:16
  from 'C:\wamp64\www\DWES-DAUC-2023\php\smarty_grupo\templates\carrito_formulario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_641098e4127948_79530684',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3af94a5411d53a062f825e26ffa2545a5eaaa429' => 
    array (
      0 => 'C:\\wamp64\\www\\DWES-DAUC-2023\\php\\smarty_grupo\\templates\\carrito_formulario.tpl',
      1 => 1678809139,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_641098e4127948_79530684 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
    <title>Producto cantidad</title>
    <link rel="stylesheet" href="css/carrito.css">
</head>

<body>

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

</html><?php }
}
