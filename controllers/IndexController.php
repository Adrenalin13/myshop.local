<?php

// !Контроллер главной страницы!

// Подключаем модели
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

function testAction() {
    echo 'IndexController.php>testAction';
}


// Формирование главной страницы
// @param object $smarty шаблонизатор
function indexAction($smarty) {

    $rsCategories = getAllMainCartWithChildren(); // rs- record set - набор данных категорий
    $rsProducts = getLastProducts(16); // Последние 16 добавленных товаров

    $smarty->assign('pageTitle', 'Главная страница сайта');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);


    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}