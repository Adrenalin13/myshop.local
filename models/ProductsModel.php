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