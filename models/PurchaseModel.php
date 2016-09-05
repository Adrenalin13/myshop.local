<?php

/**
 * Модель для таблицы продукции (purchase)
 *
*/

/**
 * Внесение в БД данных продуктов с привязкой к заказу
 *
 * @param integer $orderId ID заказа
 * @param array $cart массив корзины
 * @return boolean TRUE в случае успешного добавления в БД
*/
function setPurchaseForOrder($orderId, $cart)
{
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $query = "INSERT INTO purchase
              (order_id, product_id, price, amount)
              VALUES ";

    $values = array();
    // формируем массив строк для запроса для каждого товара
    foreach ($cart as $item) {
        $values[] = "('{$orderId}', '{$item['id']}', '{$item['price']}', '{$item['cnt']}')";
    }

    // преобразовываем этот массив в строку
    $query .= implode($values, ', ');
    $rs = mysqli_query($dbc, $query);

    return $rs;
}

