<?php

// Модель для таблицы категорий (categories)

function getAllMainCartWithChildren() {
    $query = "SELECT * FROM categories WHERE parent_id = 0";

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $rs = mysqli_query($dbc, $query);

    $smartyRs = array();
    // Извлекаем данные построчно. ПОлучаем строки записей
    while ($row = mysqli_fetch_assoc($rs)) {
        $smartyRs[] = $row; // помещаем извлеченные данные в массив для smarty
    }
    return $smartyRs;
}