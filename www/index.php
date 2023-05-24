<?php
/**
 * Самый главный файл.
 * Его задача следить за тем, что приходит на главную страницу
 * и переводить пользователя на другие страницы.
*/

// Стартуем сессию
session_start();

// Если в сессии нет массива корзины, то создаем его
if (!isset($_SESSION['cart'])) {
  $_SESSION['cart'] = [];
}

// Подключение настроек.
include_once '../config/config.php';
// Инициализация базы данных.
include_once '../config/db.php';
// Основные функции.
include_once '../library/mainFunctions.php';

// Определяем с каким контроллером будем работать.
$controllerName = isset($_GET['controller']) ?
  ucfirst($_GET['controller']) : 'Index';

// Определяем с какой функцией будем работать.
$actionName = $_GET['action'] ?? 'index';


if (isset($smarty)) {
  $smarty->assign('cartCntItems', count($_SESSION['cart']));
  loadPage($smarty, $controllerName, $actionName);
}
