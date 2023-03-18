<?php

/**
 * Инициализация доключения к БД
 */

$dblocation = '127.0.0.1';
$dbname     = 'db_motomagazine';
$dbuser     = 'root';
$dbpassword = 'Password123#@!';

// Соединение с БД.
$db = new mysqli($dblocation, $dbuser, $dbpassword);

if (!$db) {
    echo "Ошибка доступа к MySQL";
    exit();
}

// Устанавливаем кодировку по умолчанию для текущего соединения.
$db->set_charset('utf8');

if (!$db->select_db($dbname)) {
    echo "Ошибка доступа к базе данных $dbname";
    exit();
}
