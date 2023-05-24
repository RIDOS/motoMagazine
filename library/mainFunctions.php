<?php

/**
 * Контроллер загрузки страниц.
 *
 * @param $smarty
 * @param $controllerName
 * @param string $actionName
 *
 * @return void
 */
function loadPage($smarty, $controllerName, string $actionName = 'index'): void
{
    include_once PathPrefix . $controllerName . PathPostfix;

    // Формируем название функции.
    $function = $actionName . 'Action';
    $function($smarty);
}

/**
 * Загрузка шаблона
 * Первый параметр объект шаблонизатор,
 * Второй параметр название файла шаблона
 *
 * @param $smarty
 * @param $templateName
 *
 * @return void
 */
function loadTemplate($smarty, $templateName): void
{
    ini_set("display_errors", true);
//    dump($smarty);
    $smarty->display($templateName . TemplatePostfix);
}

/**
 * Функция отладки. Останавливает работу программы
 * выводя значениен переменной
 *
 * @param $value
 * @param bool $die
 *
 * @return void
 */
function dump($value = null, bool $die = true)
{
    echo "Debug <br /><pre>";
    var_dump($value);
    echo "</pre>";

    if ($die) die;
}


/**
 * Преобразование результата работы функции выборки в ассоциативный массив
 * 
 * @param recordest $rs набор строк - результат работы SELECT
 * @return array|bool
 */
function createSmartyRsArray($result): array|bool
{
    if (is_null($result)) return false;

    $smartyRs = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $smartyRs[] = $row;
    }

    return $smartyRs;
}