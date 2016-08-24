<?php

session_start(); // стартуем сессию

//  Если в сессии нет массива корзины, то создаем его
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

include_once '../config/config.php';         // инициализация настроек
include_once '../config/dbc.php';             // инициализация БД
include_once '../library/mainFunctions.php'; // основные функции

// Пишем GET запрос в строку браузера http://myshop.local/www/?controller=index&action=test
// чтобы иметь доступ для контроллера

// Определяем с каким контроллером будем работать
$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Index';

// Определяем с какой функцией будем работать в данном контроллере
$actionName = isset($_GET['action']) ? $_GET['action'] : 'Index';

// инициализируем переменную smarty количества элементов в корзине
$smarty->assign('cartCntItems', count($_SESSION['cart']));

// вызываем ф-цию для формирования страницы
loadPage($smarty, $controllerName, $actionName);