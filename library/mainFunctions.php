<?php

// Определяем контроллер для загрузки страницы

function loadPage($controllerName, $actionName = 'index') {
    include_once PathPrefix . $controllerName . PathPostfix;

    // Формируем название функции
    $function = $actionName . 'Action';
    $function();
}