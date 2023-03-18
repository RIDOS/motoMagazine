<?php
/**
 * Самый главный файл.
 * Его задача следить за тем, что приходит на главную страницу
 * и переводить пользователя на другие страницы.
*/

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
    loadPage($smarty, $controllerName, $actionName);
}
