<?php
/* Smarty version 4.3.0, created on 2023-03-12 15:05:50
  from 'C:\wamp64\www\DWES-DAUC-2023\php\smarty_grupo\templates\formulario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_640dea4e8ffa34_74739661',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '40699147c633bcd1e8b52f24892890ab071bcaa0' => 
    array (
      0 => 'C:\\wamp64\\www\\DWES-DAUC-2023\\php\\smarty_grupo\\templates\\formulario.tpl',
      1 => 1678633548,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_640dea4e8ffa34_74739661 (Smarty_Internal_Template $_smarty_tpl) {
?><h1>Agregar productos</h1>
<form method="post">
    <label for="producto">Producto:</label>
    <input type="text" name="producto" autofocus><br><br>
    <label for="cantidad">Cantidad:</label>
    <input type="number" name="cantidad"><br><br>
    <input type="submit" value="Agregar">
    <button type="submit" name="cerrar">Borrar carrito</button>
</form><?php }
}
