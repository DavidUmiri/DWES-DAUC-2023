<?php
/* Smarty version 4.3.0, created on 2023-03-14 16:14:29
  from 'C:\wamp64\www\DWES-DAUC-2023\php\smarty_grupo\templates\cambiar_tema.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_64109d65a95bf2_36491258',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '6aa8be11d790e1e6b4820ffa8988f73a76bf53d9' => 
    array (
      0 => 'C:\\wamp64\\www\\DWES-DAUC-2023\\php\\smarty_grupo\\templates\\cambiar_tema.tpl',
      1 => 1678810467,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_64109d65a95bf2_36491258 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
    <title>Claro - Oscuro</title>
</head>

<body>

        <?php if ($_SESSION['tema'] == 'light') {?>
        <link rel="stylesheet" type="text/css" href="css/light.css">
        <h1>Claro</h1>
    <?php } else { ?>
        <link rel="stylesheet" type="text/css" href="css/dark.css">
        <h1>Oscuro</h1>
    <?php }?>

        <form method="post">
        <button name="cambiarTema" type="submit">Cambiar tema</button>
    </form>

</body>

</html><?php }
}
