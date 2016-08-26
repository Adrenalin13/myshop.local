<?php
/**
 * Модель для страницы пользователей (users)
 */


/*
Регистрация нового пользователя

@param string $email почта
@param string $pwdMD5 пароль, зашифрованный в MD5
@param string $name имя пользователя
@param string $phone телефон
@param string $adress адрес пользователя
@return array массив данных нового пользователя
*/
function registerNewUser($email, $pwdMD5, $name, $phone, $adress)
{
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    $email = htmlspecialchars(mysqli_real_escape_string($dbc, $email));
    $name = htmlspecialchars(mysqli_real_escape_string($dbc, $name));
    $phone = htmlspecialchars(mysqli_real_escape_string($dbc, $phone));
    $adress = htmlspecialchars(mysqli_real_escape_string($dbc, $adress));

    $query = "INSERT INTO
              users (`email`, `pwd`, `name`, `phone`, `adress`)
              VALUES ('{$email}', '{$pwdMD5}', '{$name}', '{$phone}', '{$adress}')";
    $rs = mysqli_query($dbc, $query);


    if ($rs) {
        $query = "SELECT *
                  FROM users
                  WHERE (`email` = '{$email}' AND `pwd` = '{$pwdMD5}') 
                  LIMIT 1";

        $rs = mysqli_query($dbc, $query);
        $rs = createSmartyRsArray($rs);

        if (isset($rs[0])) {
            $rs['success'] = 1;
        } else {
            $rs['success'] = 0;
        }
    } else {
        $rs['success'] = 0;
    }

    return $rs;
}


/*
Проверка параметров для регистрации пользователей

@param string $email email
@param string $pwd1 пароль
@param string $pwd2 повтор пароля
@return array результат
*/
function checkRegisterParams($email, $pwd1, $pwd2)
{
    $res = array();

    if (!$email) {
        $res['success'] = false;
        $res['message'] = 'Введите email';
    }

    if (!$pwd1) {
        $res['success'] = false;
        $res['message'] = 'Введите пароль';
    }

    if (!$pwd2) {
        $res['success'] = false;
        $res['message'] = 'Повторите пароль';
    }

    if ($pwd1 != $pwd2) {
        $res['success'] = false;
        $res['message'] = 'Пароли не совпадают';
    }

    return $res;
}


/*
Проверка почты (есть ли email в БД)

@param string $email
@return array() массив - строка из массива users, либо пустой массив
*/
function checkUserEmail($email)
{
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $email = mysqli_real_escape_string($dbc, $email);
    $query = "SELECT id 
              FROM users 
              WHERE email = '{$email}'";

    $rs = mysqli_query($dbc, $query);
    $rs = createSmartyRsArray($rs);

    return $rs;
}
