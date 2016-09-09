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


/**
 * Шаг 1 Страница управления товарами
 *
 * @param type $smarty
*/
function productsAction($smarty)
{
    $rsCategories = getAllCategories();   // все категории требуются чтобы иметь возможность выводить их на странице
    $rsProducts   = getProducts();

    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);

    $smarty->assign('pageTile', 'Управление сайтом');

    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'adminProducts');
    loadTemplate($smarty, 'adminFooter');  // далее создаем ф-цию getProducts в ProductsModel
}


/**
 * шаг 5й создаем экшн на кнопку импользуя созданную ф-цию insertProduct
*/
function addproductAction()
{
    $itemName  = $_POST['itemName'];
    $itemPrice = $_POST['itemPrice'];
    $itemDesc  = $_POST['itemDesc'];
    $itemCat   = $_POST['itemCatId'];

    $res = insertProduct($itemName, $itemPrice, $itemDesc, $itemCat);

    if ($res) {
        $resData['success'] = 1;
        $resData['message'] = 'Изменения успешно внесены';
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Ошибка изменения данных';
    }

    echo json_encode($resData);
    return;   // далее создаем функцию обработки onclick в admin.js
}


/**
 * шаг 9 создаем экшн управляющий ф-цией обновления продуктов
*/
function updateproductAction()
{
    $itemId     = $_POST['itemId'];
    $itemName   = $_POST['itemName'];
    $itemPrice  = $_POST['itemPrice'];
    $itemStatus = $_POST['itemStatus'];
    $itemDesc   = $_POST['itemDesc'];
    $itemCat    = $_POST['itemCatId'];

    $res = updateProduct($itemId, $itemName, $itemPrice, $itemStatus, $itemDesc, $itemCat);

    if ($res) {
        $resData['success'] = 1;
        $resData['message'] = 'Изменения успешно внесены';
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Ошибка изменения данных';
    }

    echo json_encode($resData);
    return;    // далее в admin.js создаем ф-цию на onclick сохраняющую изменения
}


/**
 * Шаг 11 реализуем загрузку изображений на сервер
*/
function uploadAction() //название upload берем из верстки /admin/upload/
{
    $maxSize = 2 * 1024 * 1024; //максимальный размер файла 2м

    // получаем id элемента из верстки
    $itemId = $_POST['itemId'];
    // получаем расширение загружаемого файла из верстки
    $ext = pathinfo($_FILES['filename']['name'], PATHINFO_EXTENSION);
    // создаем имя файла
    $newFileName = $itemId . '.' . $ext;

    if ($_FILES["filename"]["size"] > $maxSize) {
        echo ("Размер файла превышает 2 мегабайта");
        return;
    }

    // загружаем файл . Определяем загружен ли файл методом http POST чтобы не загрузили опасные файлы
    if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
        // если файл загружен, то перенаправляем его из временной директории в конечную
        $res = move_uploaded_file($_FILES['filename']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/images/products/' .
            $newFileName);
        if($res) {
            // обновляем запись в БД , для данного продукта указываем его имя картинки
            $res = updateProductImage($itemId, $newFileName);
            if ($res) {
                redirect('/admin/products/'); // если все хорошо= обновляем страницу
            }
        }
    } else {
        echo ("Ошибка загрузки файла");
    }

} // далее создаем ф-цию updateProductImage в ProductsModel


/**
 * СОздание страницы заказа.
 * шаг 1 Экшн для главной страницы
*/
function ordersAction($smarty)
{
    $rsOrders = getOrders(); // тут получим все данные заказов

    $smarty->assign('rsOrders', $rsOrders);
    $smarty->assign('pageTitle', 'Заказы');

    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'adminOrders');
    loadTemplate($smarty, 'adminFooter');
} // далее в OrdersModel создадим getOrders, чтобы получить данные заказов


/**
 * 6 Шаг.   Делаем экшн для Статуса и Даты оплаты, который бедем вызывать из js
*/
// чтобы установить новый статус для заказа
function setorderstatusAction()
{
    $itemId = $_POST['itemId'];
    $status = $_POST['status'];

    $res = updateOrderStatus($itemId, $status);

    if ($res) {
        $resData['success'] = 1;
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Ошибка установки статуса';
    }

    echo json_encode($resData);
    return;
}

// экшн чтобы установить дату оплаты
function setorderdatepaymentAction()
{
    $itemId = $_POST['itemId'];
    $datePayment = $_POST['datePayment'];

    $res = updateOrderDatePayment($itemId, $datePayment);

    if ($res) {
        $resData['success'] = 1;
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Ошибка установки даты оплаты';
    }

    echo json_encode($resData);
    return;
}
// -------------Далее в admin.js создадим ф-ции, вызывающие данные экшены
