<?php
/* Smarty version 4.3.0, created on 2023-03-13 12:15:44
  from 'C:\wamp64\www\DWES-DAUC-2023\php\smarty_grupo\templates\plantilla.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_640f13f0b9c114_03806834',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd7db903338c80e2d77258007611479a0578948f2' => 
    array (
      0 => 'C:\\wamp64\\www\\DWES-DAUC-2023\\php\\smarty_grupo\\templates\\plantilla.tpl',
      1 => 1678709741,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_640f13f0b9c114_03806834 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
    <title>Claro - Oscuro</title>
</head>

<body>

        <form method="post">
        <button name="cambiarTema" type="submit">Cambiar tema</button>
    </form>

        <?php if ($_SESSION['tema'] == 'light') {?>
        <link rel="stylesheet" type="text/css" href="css/light.css">
        <h1>Claro</h1>
    <?php } else { ?>
        <link rel="stylesheet" type="text/css" href="css/dark.css">
        <h1>Oscuro</h1>
    <?php }?>

</body>

</html><?php }
}
