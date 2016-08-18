<?php

// Контроллер главной страницы

function testAction() {
    echo 'IndexController.php>testAction';
}


// Формирование главной страницы
// @param object $smarty шаблонизатор
function indexAction($smarty) {

    $smarty->assign('pageTitle', 'Главная страница сайта');

    loadTemplate($smarty, 'index');
}