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


/**
 * Страница управления категориями . Первое что делаем - новый экшн
 *
 * @param type $smarty
*/
function categoryAction($smarty)
{
    $rsCategories = getAllCategories();
    $rsMainCategories = getAllMainCategories();

    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsMainCategories', $rsMainCategories);
    $smarty->assign('pageTitle', 'Управление сайтом');

    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'adminCategory');
    loadTemplate($smarty, 'adminFooter');
}


/**
 * четвертый шаг экшн вызавающий ф-ция из CategoryModel
*/
function updatecategoryAction()
{
    $itemId        = $_POST['itemId'];
    $parentId     = $_POST['parentId'];
    $newName  = $_POST['newName'];

    $res = updateCategoryData($itemId, $parentId, $newName);

    if ($res) {
        $resData['success'] = 1;
        $resData['message'] = 'Катогория обновлена';
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Ошибка изменения данных категории';
    }

    echo json_encode($resData);
    return;  // далее делаем js ф-цию, дергающую данный экшн
}