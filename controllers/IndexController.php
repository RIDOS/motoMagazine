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
    $smarty->assign('templateWebPath', TemplateWebPath);
//    dump($smarty);
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}
