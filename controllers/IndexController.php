<?php

// !Контроллер главной страницы!

// Подключаем модели
include_once '../models/CategoriesModel.php';

function testAction() {
    echo 'IndexController.php>testAction';
}


// Формирование главной страницы
// @param object $smarty шаблонизатор
function indexAction($smarty) {

    $rsCategories = getAllMainCartWithChildren(); // rs- record set - набор данных категорий

    $smarty->assign('pageTitle', 'Главная страница сайта');
    $smarty->assign('rsCategories', $rsCategories);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}