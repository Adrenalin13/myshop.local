<?php

/**
 * AdminController.php
 *
 * Контроллер бэкэнда сайта (/admin/)
 */

// подключаем модели
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';
include_once '../models/OrdersModel.php';
include_once '../models/PurchaseModel.php';

// переобозначим пути шаблонов для админки
$smarty->setTemplateDir(TEMPLATE_ADMIN_PREFIX);
$smarty->assign('templateWebPath', TEMPLATE_ADMIN_WEB_PATH);

// главная страница админки
function indexAction($smarty)
{
    $rsCategories = getAllMainCategories();

    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('pageTitle', 'Управление сайтом');

    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'admin');
    loadTemplate($smarty, 'adminFooter');
}


function addnewcatAction()                       // экшн дергает функцию из модели и добавляет категорию
{
    $catName     = $_POST['newCategoryName'];
    $catParentId = $_POST['generalCatId'];

    $res = insertCat($catName, $catParentId);
    if ($res) {
        $resData['success'] = 1;
        $resData['message'] = 'Категория добавлена';
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Ошибка добавления категории';
    }

    echo json_encode($resData);
    return;             // далее вешаем это действие на кнопку "добавить категорию"
}