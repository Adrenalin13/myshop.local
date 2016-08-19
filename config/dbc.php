<?php

// Инициализация подключения к БД
define('DB_HOST', '127.0.0.1');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'myshop');

// соединение с БД
$dbc = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if (!$dbc) {
    echo 'Ошибка подключения к MySql';
    exit();
}

// Устанавливает кодировку по умолчанию для текущего соединения
mysqli_set_charset($dbc, 'utf8');

if (!mysqli_select_db($dbc, DB_NAME)) {
    echo "Ошибка доступа к БД: {DB_NAME}" ;
    exit();
}