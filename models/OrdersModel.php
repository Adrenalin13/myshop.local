<?php

/**
 * Модель для таблицы заказов (orders)
 *
*/

/**
 * Создание нового заказа (без привязки товаров)
 *
 * @param string $name
 * @param string $phone
 * @param string $adress
 * @return integer Id создаваемого заказа
*/
function makeNewOrder($name, $phone, $adress)
{
    // инициализация переменных для заполнения таблиц заказов // переменные нужно обезопасить от SQL-injection
    $userId      = $_SESSION['user']['id'];
    $comment     = "ID пользователя: {$userId}<br>
                    Имя: {$name}<br>              
                    Тел: {$phone}<br>
                    Адрес: {$adress}";

    $dateCreated = date('Y.m.d H:i:s');
    $userIp      = $_SERVER['REMOTE_ADDR'];      // не самый лучший способ получения IP

    // формирование запроса к БД
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $query = "INSERT INTO orders (
              `user_id`, `date_created`, `date_payment`, `status`, `comment`, `user_ip`)
              VALUES ('{$userId}', '{$dateCreated}', null, '0', '{$comment}', '{$userIp}')";

    $rs = mysqli_query($dbc, $query);

    // нужно получить id этого нового заказа / не лучший способ
    if ($rs) {
        $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
        $query = "SELECT id 
                  FROM orders
                  ORDER BY ID DESC
                  LIMIT 1";

        $rs = mysqli_query($dbc, $query);
        // преобразуем результат запроса
        $rs = createSmartyRsArray($rs);

        //если строка найдена, заберем ее id
        if (isset($rs[0])) {
            return $rs[0]['id'];
        }
    }

    // если запись не найдена
    return false;
}

/**
 * Получить список заказов с привязкой к продуктам для пользователя $userId
 *
 * @param integer $userId ID пользователя
 * @return array массив заказов с привязкой к продуктам
*/
function getOrdersWithProductsByUser($userId)
{
    $userId = intval($userId);
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $query = "SELECT * FROM orders
              WHERE `user_id` = '{$userId}'
              ORDER BY id DESC";

    $rs = mysqli_query($dbc, $query);

    $smartyRs = array();
    while ($row = mysqli_fetch_assoc($rs)) {
        $rsChildren = getPurchaseForOrder($row['id']);  // получить покупки для заказа. Возвращает массив покупок для
        // заказа

        if ($rsChildren) {
            $row['children'] = $rsChildren;
            $smartyRs[] = $row;
        }
    }

    return $smartyRs;
}


/**
 * 2 шаг странизы заказов в админке. ПОлучение данных заказов
*/
function getOrders()
{
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $query = "SELECT o.*, u.name, u.email, u.phone, u.adress
              FROM orders AS `o`
              LEFT JOIN users AS `u`
              ON o.user_id = u.id
              ORDER BY id DESC";

    $rs = mysqli_query($dbc, $query);

    $smartyRs = array();
    while ($row = mysqli_fetch_assoc($rs)) {
        $rsChildren = getProductsForOrders($row['id']);

        if ($rsChildren) {
            $row['children'] = $rsChildren;
            $smartyRs[] = $row;
        }
    }
    return $smartyRs;
} // далее тут же создаем ф-цию getProductsForOrders


/**
 * шаг 3 ПОлучить продукты определенного заказа
 *
 * @param integer $orderId ID заказа
 * @return array массив данных товаров
*/
function getProductsForOrders($orderId)
{
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $query = "SELECT *
              FROM purchase AS pe
              LEFT JOIN products AS ps
              ON pe.product_id = ps.id
              WHERE (`order_id` = '{$orderId}')";

    $rs = mysqli_query($dbc, $query);
    return createSmartyRsArray($rs);
} // далее делаем верстку adminOrders.tpl


/**
 * 5 Шаг .реализуем работу чекбокса "статус" и ПОля "данные оплаты"
*/
// Обновление статуса по чекбоксу
function updateOrderStatus($itemId, $status) // параметры Идентификатор заказа и Статус
{
    $status = intval($status);

    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $query = "UPDATE orders
              SET `status` = '{$status}'
              WHERE id = '{$itemId}'";

    $rs = mysqli_query($dbc, $query);
    return $rs;
}

// Обновляем дату оплаты заказа
function updateOrderDatePayment($itemId, $datePayment)
{
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $query = "UPDATE orders
              SET `date_payment` = '{$datePayment}'
              WHERE id = '{$itemId}'";

    $rs = mysqli_query($dbc, $query);
    return $rs;
}                                  // далее в AdminController для данных событий делаем экшн