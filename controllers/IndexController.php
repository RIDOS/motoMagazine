<?php

/**
 * Контроллер главной страницы.
 * @return void
 */

use Model\CategoriesModel;
use Model\ProductsModel;

// подключение моделей.
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

/**
 * @return void
 */
function testAction(): void
{
    echo 'IndexController.php > testAction';
}

/**
 * @param $smarty
 *
 * @return void
 */
function indexAction($smarty): void
{
    $rsCategories = (new CategoriesModel())->getAllMainCatsWithChildren();
    $rsProducts = (new ProductsModel())->getLastProducts(6);
    // dump($rsProducts);

    $smarty->assign([
        'pageTitle' => 'Главная страница сайта',
        'templateWebPath' => TemplateWebPath,
        'categories' => $rsCategories,
        'products' => $rsProducts,
    ]);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}
