<?php
require_once 'config.php';

$titulo = 'Mi primer título locoo';
$descripcion = 'Aquí va la descripción pana';

$smarty->assign('titulo', $titulo);
$smarty->assign('descripcion', $descripcion);


$smarty->display('index.tpl');
