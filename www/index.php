<?php

include_once '../config/config.php'; // инициализация настроек
include_once '../library/mainFunctions.php'; // основные функции

// Пишем GET запрос в строку браузера http://myshop.local/www/?controller=index&action=test
// чтобы иметь доступ для контроллера

// Определяем с каким контроллером будем работать
$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Index';

// Определяем с какой функцией будем работать в данном контроллере
$actionName = isset($_GET['action']) ? $_GET['action'] : 'Index';

// вызываем ф-цию для формирования страницы
loadPage($smarty, $controllerName, $actionName);