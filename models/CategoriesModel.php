<?php

// Модель для таблицы категорий (categories)



// Получить дочерние категории для категории $catId
// @param integer $catId ID категории
// @return array массив дочерних категорий
function getChildrenForCat($catId) {
    $query = "SELECT * FROM categories WHERE parent_id = '{$catId}';";
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $rs = mysqli_query($dbc, $query);

    return createSmartyRsArray($rs);
}

// Получить главные категории с привязками дочерних
// @return array массив категорий
function getAllMainCartWithChildren() {
    $query = "SELECT * FROM categories WHERE parent_id = 0;";
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $rs = mysqli_query($dbc, $query);

    $smartyRs = array();
    // Извлекаем данные построчно. ПОлучаем строки записей
    while ($row = mysqli_fetch_assoc($rs)) {
        $rsChildren = getChildrenForCat($row['id']); // массив дочерних категорий
        if ($rsChildren) {
            $row['children'] = $rsChildren;
        }

        $smartyRs[] = $row; // помещаем извлеченные данные в массив для smarty
    }
    return $smartyRs;
}