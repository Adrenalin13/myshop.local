<?php

// !Контроллер страницы товара (/product/1)


// Подключаем модели
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

// Формирование страницы продукта
// @param object smarty шаблонизатор
function indexAction($smarty) {
    $itemId = isset($_GET['id']) ? $_GET['id'] : null;
    if (!$itemId) exit();

    // Получить данные продукта
    $rsProduct = getProductById($itemId);

    // Получить все категории (главное меню сайта)
    $rsCategories = getAllMainCatsWithChildren();

    $smarty->assign('itemInCart', 0);
    if (in_array($itemId, $_SESSION['cart'])) {
        $smarty->assign('itemInCart', 1);
    }

    $smarty->assign('pageTitle', '');                // Заголовок страницы
    $smarty->assign('rsCategories', $rsCategories);  // Формирование левого меню
    $smarty->assign('rsProduct', $rsProduct);        // Передать в шаблон продукт

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'product');
    loadTemplate($smarty, 'footer');
}