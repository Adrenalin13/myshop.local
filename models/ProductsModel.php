<?php

// !Модель для таблицы продукции (products)!


// Получаем последние добавленные товары
// @param integer $limit лимит товаров
// @return array массив товаров
function getLastProducts($limit = null) {
    $query = "SELECT * FROM products ORDER BY id DESC";
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
function getProductsByCat($itemId) {
    $itemId = intval($itemId);
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $query = "SELECT *
              FROM products
              WHERE category_id = '{$itemId}'";

    $rs = mysqli_query($dbc, $query); // получаем данные

    return createSmartyRsArray($rs);   // преобразовываем их в ассоциативный массив
}