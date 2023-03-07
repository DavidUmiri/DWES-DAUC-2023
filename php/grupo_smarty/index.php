<?php
require_once("smarty-4.3.0/libs/Smarty.class.php");

// Instanciar la clase de Smarty
$smarty = new Smarty();

// Configurar Smarty
$smarty->template_dir = "./templates/";
$smarty->compile_dir = "./templates_c/";
$smarty->config_dir = "./configs/";
$smarty->cache_dir = "./cache/";

// Establecer variables que se usarán en la plantilla
$smarty->assign("nombre", "José Manuel Pardo Pérez");
$smarty->assign("direccion", "C/ Alpes, 992");

// Mostrar la plantilla
$smarty->display("index.html");
