<?php
/* Smarty version 4.3.0, created on 2023-03-11 19:32:09
  from 'C:\wamp64\www\DWES-DAUC-2023\php\smarty_grupo\templates\formulario.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_640cd739bdba73_81271819',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '40699147c633bcd1e8b52f24892890ab071bcaa0' => 
    array (
      0 => 'C:\\wamp64\\www\\DWES-DAUC-2023\\php\\smarty_grupo\\templates\\formulario.tpl',
      1 => 1678563126,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_640cd739bdba73_81271819 (Smarty_Internal_Template $_smarty_tpl) {
?><h2>Agregar productos</h2>
<form method="post">
    <label for="producto">Producto:</label>
    <input type="text" name="producto" autofocus><br><br>
    <label for="cantidad">Cantidad:</label>
    <input type="number" name="cantidad"><br><br>
    <input type="submit" value="Agregar">
    <button type="submit" name="cerrar">Cerrar sesión</button>
</form><?php }
}
