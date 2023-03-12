<?php
require_once("smarty-4.3.0/libs/Smarty.class.php");

// Instanciar la clase de Smarty
$smarty = new Smarty();

// Configurar Smarty
$smarty = new Smarty;
$smarty->setTemplateDir('templates');
$smarty->setCompileDir('templates_c');
$smarty->setCacheDir('cache');
$smarty->setConfigDir('configs');
