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
    $comment     = "id пользователя: {$userId}<br>
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

