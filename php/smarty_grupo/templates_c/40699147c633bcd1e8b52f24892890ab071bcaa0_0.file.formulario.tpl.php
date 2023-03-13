<?php
/* Smarty version 4.3.0, created on 2023-03-13 11:58:18
  from 'C:\wamp64\www\DWES-DAUC-2023\php\smarty_grupo\templates\formulario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_640f0fda63fab9_25776855',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '40699147c633bcd1e8b52f24892890ab071bcaa0' => 
    array (
      0 => 'C:\\wamp64\\www\\DWES-DAUC-2023\\php\\smarty_grupo\\templates\\formulario.tpl',
      1 => 1678708696,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_640f0fda63fab9_25776855 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
    <title>Producto cantidad</title>
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
