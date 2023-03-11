<?php
require_once("smarty-4.3.0/libs/Smarty.class.php");

// instanciar la clase de Smarty
$smarty = new Smarty();

// configurar Smarty
$smarty = new Smarty;
$smarty->setTemplateDir('templates');
$smarty->setCompileDir('templates_c');
$smarty->setCacheDir('cache');
$smarty->setConfigDir('configs');
