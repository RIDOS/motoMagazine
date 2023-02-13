<?php

/**
 * Контроллер главной страницы.
 * @return void
 */
function testAction(): void
{
    echo 'IndexController.php > testAction';
}

function indexAction($smarty): void
{
    $smarty->assign('pageTitle', 'Главная страница сайта');

    loadTemplate($smarty, 'index');
}
