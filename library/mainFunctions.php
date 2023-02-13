<?php

/**
 * Контроллер загрузки страниц.
 *
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
function dump($value, bool $die = true)
{
    echo 'Debug" <br /><pre></pre>';
    var_dump($value);
    if ($die) die;
}
