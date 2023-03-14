<?php
/* Smarty version 4.3.0, created on 2023-03-14 15:49:18
  from 'C:\wamp64\www\DWES-DAUC-2023\php\smarty_grupo\templates\autenticacion.tpl' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '4.3.0',
  'unifunc' => 'content_6410977ecebd06_35640848',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '69b8b24fc4c150f2d45836345543a6db3d279a0e' => 
    array (
      0 => 'C:\\wamp64\\www\\DWES-DAUC-2023\\php\\smarty_grupo\\templates\\autenticacion.tpl',
      1 => 1678808954,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_6410977ecebd06_35640848 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>Autenticación</title>
    <link rel="stylesheet" href="css/autenticacion.css">
</head>

<body>

    <?php if ($_smarty_tpl->tpl_vars['formulario']->value == true) {?>

        
        <h1>Iniciar sesión</h1>

        <form method="post" action="autenticacion.php">
            <label for="usuario">Usuario:</label>
            <input type="text" name="usuario" id="usuario" autofocus>
            <label for="contrasena">Contraseña:</label>
            <input type="password" name="contrasena" id="contrasena"><br><br>
            <input type="submit" value="Iniciar sesión">
        </form>

    <?php } elseif ($_smarty_tpl->tpl_vars['usuario']->value) {?>

        
        <h1>Bienvenido, <?php echo $_smarty_tpl->tpl_vars['usuario']->value;?>
</h1>
        <h1>Tu contraseña es: <?php echo $_smarty_tpl->tpl_vars['contrasena']->value;?>
</h1>

                <form method="post" action="autenticacion.php">
            <input type="hidden" name="cerrar" value="true">
            <input type="submit" value="Cerrar sesión">
        </form>

    <?php }?>

</body>

</html><?php }
}
