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
    $paginator = [];
    $paginator['perPage'] = 6;
    $paginator['currentPage'] = $_GET['page'] ?? 1;
    $paginator['offset'] = ($paginator['currentPage'] * $paginator['perPage'] - $paginator['perPage']);
    $paginator['link'] = '/?controller=index&page=';

    list($rsProducts, $allCnt) = (new ProductsModel())->getLastProducts($paginator['offset'], $paginator['perPage']);

    $paginator['pageCnt'] = ceil($allCnt / $paginator['perPage']);

    $rsCategories = (new CategoriesModel())->getAllMainCatsWithChildren();
    // dump($rsProducts);

    $smarty->assign([
        'pageTitle' => 'Главная страница сайта',
        'templateWebPath' => TemplateWebPath,
        'categories' => $rsCategories,
        'products' => $rsProducts,
        'paginator' => $paginator,
    ]);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'index');
    loadTemplate($smarty, 'footer');
}
