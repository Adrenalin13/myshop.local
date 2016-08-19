<?php

// Определяем контроллер для загрузки страницы

function loadPage($smarty, $controllerName, $actionName = 'index') {
    include_once PATH_PREFIX . $controllerName . PATH_POSTFIX;

    // Формируем название функции
    $function = $actionName . 'Action';
    $function($smarty);
}

// Загрузка шаблона
// @param object $smarty объект шаблонизатора
// @param string $templateName название файла шаблона
function loadTemplate($smarty, $templateName) {
    $smarty->display($templateName . TEMPLATE_POSTFIX);
}

// функция отладки. Останавливает работу программы выводя значение переменной $value
// @param variant $value переменная для вывода ее на страницу
function d($value = null, $die = 1) {
    echo 'Debug: <br><pre>';
    print_r($value);
    echo '</pre>';

    if($die) die;
}