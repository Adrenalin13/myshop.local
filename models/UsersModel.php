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


/*
Авторизация пользователя
 * 
@param string $email почта (логин)
@param string $pwd пароль
@return array массив данных пользователя
*/
function loginUser($email, $pwd)
{
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    $email = htmlspecialchars(mysqli_real_escape_string($dbc, $email));
    $pwd = md5($pwd);

    $query = "SELECT *
              FROM users
              WHERE (`email` = '{$email}' 
              AND `pwd` = '{$pwd}') 
              LIMIT 1";

    $rs = mysqli_query($dbc, $query);

    $rs = createSmartyRsArray($rs);
    if (isset($rs[0])) {
        $rs['success'] = 1;
    } else {
        $rs['success'] = 0;
    }

    return $rs;
}

/**
 * Изменение данных пользователя на странице пользователя
 * 
 * @param string $name имя
 * @param string $phone тел
 * @param string $adress адрес
 * @param string $pwd1 пароль
 * @param string $pwd2 повтор пароля
 * @param string $curPwd текущий пароль
 * @return boolean TRUE в случае успеха
 */
function updateUserData($name, $phone, $adress, $pwd1, $pwd2, $curPwd)
{
    $dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

    $email  = htmlspecialchars(mysqli_real_escape_string($dbc, $_SESSION['user']['email']));
    $name   = htmlspecialchars(mysqli_real_escape_string($dbc, $name));
    $phone  = htmlspecialchars(mysqli_real_escape_string($dbc, $phone));
    $adress = htmlspecialchars(mysqli_real_escape_string($dbc, $adress));
    $pwd1   = trim($pwd1);
    $pwd2   = trim($pwd2);

    $newPwd = null;
    if ($pwd1 && ($pwd1 == $pwd2)) {
        $newPwd = md5($pwd1);
    }

    $query = "UPDATE users SET ";

    if ($newPwd) {
        $query .= "`pwd` = '{$newPwd}', ";
    }

    $query .= "`name` = '{$name}', `phone` = '{$phone}', `adress` = '{$adress}' WHERE `email` = '{$email}' AND `pwd` = '{$curPwd}' LIMIT 1";
    $rs = mysqli_query($dbc, $query);
    
    return $rs;
}