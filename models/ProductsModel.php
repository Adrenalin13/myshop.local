<?php

// !Модель для таблицы продукции (products)!


// Получаем последние добавленные товары
// @param integer $limit лимит товаров
// @return array массив товаров
function getLastProducts($limit = null)
{
    $query = "SELECT *
              FROM products
              ORDER BY id DESC";
    if ($limit) {
        $query .= " LIMIT {$limit}";
    }

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $rs = mysqli_query($dbc, $query);

    return createSmartyRsArray($rs);
}


// Получить продукты для категории $itemId
// @param integer $itemId ID категории
// @return array массив продуктов
function getProductsByCat($itemId)
{
    $itemId = intval($itemId);
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $query = "SELECT *
              FROM products
              WHERE category_id = '{$itemId}'";

    $rs = mysqli_query($dbc, $query); // получаем данные

    return createSmartyRsArray($rs);   // преобразовываем их в ассоциативный массив
}


// Получить данные продукта по ID
// @param integer $itemId ID продукта
// @return array массив данных продукта
function getProductById($itemId)
{
    $itemId = intval($itemId);
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $query = "SELECT *
              FROM products
              WHERE id = '{$itemId}'";

    $rs = mysqli_query($dbc, $query);
    return mysqli_fetch_assoc($rs);
}


/**
Получить список продуктов из массива идентификаторов (ID's)

@param type $itemsIds массив идентификаторов продуетов
@return array массив данных продуктов
*/
function getProductsFromArray($itemIds)
{
    $strIds = implode($itemIds, ', ');
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $query = "SELECT *
              FROM products
              WHERE id in ({$strIds})";
    $rs = mysqli_query($dbc, $query);

    return createSmartyRsArray($rs);
}


/**
 * шаг 2 создание ф-ции getProducts()
*/
function getProducts()
{
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $query = "SELECT *
              FROM `products`
              ORDER BY category_id";

    $rs = mysqli_query($dbc, $query);

    return createSmartyRsArray($rs);  // далее создаем adminProducts.tpl
}


/**
 * 4a шаг ф-ция для записи изменений из таблицы продуктов в админке в БД
 * Добавление нового товара
 *
 * @param string $itemName Название продукта
 * @param integer $itemPrice Цена
 * @param string $itemDesc Описпние
 * @param integer $itemCat ID категории
 * @return type
*/
function insertProduct($itemName, $itemPrice, $itemDesc, $itemCat)
{
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $query = "INSERT INTO products
              SET `name` = '{$itemName}',
                   `price` = '{$itemPrice}',
                   `description` = '{$itemDesc}',
                   `category_id` = '{$itemCat}'";

    $rs = mysqli_query($dbc, $query);
    return $rs;      // далее в AdminController делаем экшт на кнопку сохранить
}


/**
 * шаг 8 ф-ция обновления редактируемых продуктов
*/
function updateProduct($itemId, $itemName, $itemPrice, $itemStatus, $itemDesc, $itemCat, $newFileName = null)
{
    $set = array();

    if ($itemName) {
        $set[] = "`name` = '{$itemName}'";
    }

    if ($itemPrice > 0) {
        $set[] = "`price` = '{$itemPrice}'";
    }

    if ($itemStatus !== null) {
        $set[] = "`status` = '{$itemStatus}'";
    }

    if ($itemDesc) {
        $set[] = "`description` = '{$itemDesc}'";
    }

    if ($itemCat) {
        $set[] = "`category_id` = '{$itemCat}'";
    }

    if ($newFileName) {
        $set[] = "`image` = '{$newFileName}'";
    }

    $setStr = implode($set, ", ");

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $query = "UPDATE products
              SET {$setStr}
              WHERE id = '{$itemId}'";

    $rs = mysqli_query($dbc, $query);

    return $rs;  // далее в AdminController создаем экшн управляющий данной ф-цией
}


/**
 * шаг 12 ф-ция добавляющая в БД имя картинки к продукту
*/
function updateProductImage($itemId, $newFileName)
{
    $rs = updateProduct($itemId, null, null, null, null, null, $newFileName);

    return $rs; // страница товаров полностью готова/ нужно сделать чтобы товары добавлялись не во все категории, а
    // только в дочерние, иначе товар будет виден из родительской, но не из дочерней категории
}