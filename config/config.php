<?php

// файл настроек

// Константы для обращения к контроллерам
define('PATH_PREFIX', '../controllers/');
define('PATH_POSTFIX', 'Controller.php');

//> Используемый шаблон Smarty
$template = 'default';

// Пути к файлам шаблонов (.tpl)
define('TEMPLATE_PREFIX', "../views/{$template}/");
define('TEMPLATE_POSTFIX', '.tpl');

// Пути к файлам шаблонов в вебпространставе
define('TEMPLATE_WEB_PATH', "/templates/{$template}/");
//<

//> Инициализация шаблонизатора Smarty
// put full path to Smarty.class.php
require('../library/Smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir(TEMPLATE_PREFIX);
$smarty->setCompileDir('../tmp/smarty/templates_c');
$smarty->setCacheDir('../tmp/smarty/cache');
$smarty->setConfigDir('../library/Smarty/configs');

$smarty->assign('templateWebPath', TEMPLATE_WEB_PATH);
//<