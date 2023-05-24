<?php

/**
 * categoryController.php
 * 
 * Контроллер страницы категории (/category/1)
 */

use Model\CategoriesModel;
use Model\ProductsModel;

// подключение моделей.
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

/**
 * Формирование страницы категории
 * 
 * @param object $smarty шаблонизатор
 */
function indexAction($smarty): void
{
    $catId = $_GET['id'] ?? null;

    if (!$catId) exit;

    $rsProducts = null;
    $rsChildCats = null;

    $rsCategory = (new CategoriesModel())->getCatBuId($catId);

    // Если главная категория то показываем дочернии категории,
    // иначе показываем товар
    if ($rsCategory['parent_id'] == 0) {
        $rsChildCats = (new CategoriesModel())->getChildrenForCat($catId);
    } else {
        $rsProducts = (new ProductsModel())->getProductsByCat($catId);
    }

    $rsCategories = (new CategoriesModel())->getAllMainCatsWithChildren();

    $smarty->assign([
        'pageTitle'    => 'Товары категории ' . $rsCategory['name'] ?? '',
        'products'   => $rsProducts,
        'rsChildCats'  => $rsChildCats,
        'categories' => $rsCategories,
        'rsCategory' => $rsCategory,
    ]);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'category');
    loadTemplate($smarty, 'footer');
}