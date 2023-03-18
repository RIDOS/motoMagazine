<?php

/**
 * Контроллер главной страницы.
 * @return void
 */

// подключение моделей.
include_once '../models/CategoriesModel.php';

function testAction(): void
{
    echo 'IndexController.php > testAction';
}

function indexAction($smarty): void
{
    $rsCategories = getAllMainCatsWithChildren();
//    dump($rsCategories);

    $smarty->assign([
        'pageTitle' => 'Главная страница сайта',
        'templateWebPath' => TemplateWebPath,
        'categories' => $rsCategories
    ]);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}
