<?php
/* Smarty version 4.3.0, created on 2023-03-14 15:56:45
  from 'C:\wamp64\www\DWES-DAUC-2023\php\smarty_grupo\templates\carrito_compra.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6410993d2b4147_12009193',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '808331a35f9ff6f587e2c23b2be4958428563ada' => 
    array (
      0 => 'C:\\wamp64\\www\\DWES-DAUC-2023\\php\\smarty_grupo\\templates\\carrito_compra.tpl',
      1 => 1678809146,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6410993d2b4147_12009193 (Smarty_Internal_Template $_smarty_tpl) {
?><h1>Carrito de compras</h1>

<table border="1">
    <tr>
        <th>Producto</th>
        <th>Cantidad</th>
    </tr>
    <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['carrito']->value, 'cantidad', false, 'producto');
$_smarty_tpl->tpl_vars['cantidad']->do_else = true;
if ($_from !== null) foreach ($_from as $_smarty_tpl->tpl_vars['producto']->value => $_smarty_tpl->tpl_vars['cantidad']->value) {
$_smarty_tpl->tpl_vars['cantidad']->do_else = false;
?>
        <tr>
            <td><?php echo $_smarty_tpl->tpl_vars['producto']->value;?>
</td>
            <td><?php echo $_smarty_tpl->tpl_vars['cantidad']->value;?>
</td>
        </tr>
    <?php
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
</table><?php }
}
