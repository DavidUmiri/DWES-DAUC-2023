<?php
/* Smarty version 4.3.0, created on 2023-03-12 16:09:42
  from 'C:\wamp64\www\DWES-DAUC-2023\php\smarty_grupo\templates\plantilla.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_640df946608656_36574924',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd7db903338c80e2d77258007611479a0578948f2' => 
    array (
      0 => 'C:\\wamp64\\www\\DWES-DAUC-2023\\php\\smarty_grupo\\templates\\plantilla.tpl',
      1 => 1678637380,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_640df946608656_36574924 (Smarty_Internal_Template $_smarty_tpl) {
?><!-- Muestra el botón de cambio de tema -->
<form method="post">
    <button name="cambiarTema" type="submit">Cambiar tema</button>
</form>

<!-- Incluye la hoja de estilo correspondiente al tema actual -->
<?php if ($_SESSION['tema'] == 'light') {?>
    <link rel="stylesheet" type="text/css" href="css/light.css">
<?php } else { ?>
    <link rel="stylesheet" type="text/css" href="css/dark.css">
<?php }
}
}
