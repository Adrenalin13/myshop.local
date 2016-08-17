<?php

// файл настроек

// Константы для обращения к контроллерам
define('PathPrefix', '../controllers/');
define('PathPostfix', 'Controller.php');

//> Используемый шаблон Smarty
$template = 'default';

// Пути к файлам шаблонов (.tpl)
define('TemplatePrefix', "../views/{$template}/");
define('TemplatePostfix', '.tpl');

// Пути к файлам шаблонов в вебпространставе
define('TemplateWebPath', "/templates/{$template}/");
//<

//> Инициализация шаблонизатора Smarty
// put full path to Smarty.class.php
require('../library/Smarty/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir(TemplatePrefix);
$smarty->setCompileDir('../tmp/smarty/templates_c');
$smarty->setCacheDir('../tmp/smarty/cache');
$smarty->setConfigDir('../library/Smarty/configs');

$smarty->assign('templateWebPath', TemplateWebPath);
//<