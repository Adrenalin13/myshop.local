<?php

// Определяем контроллер для загрузки страницы

function loadPage($smarty, $controllerName, $actionName = 'index') {
    include_once PathPrefix . $controllerName . PathPostfix;

    // Формируем название функции
    $function = $actionName . 'Action';
    $function($smarty);
}

// Загрузка шаблона
// @param object $smarty объект шаблонизатора
// @param string $templateName название файла шаблона
function loadTemplate($smarty, $templateName) {
    $smarty->display($templateName . TemplatePostfix);
}