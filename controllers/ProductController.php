<?php
/**
 * ProductController.php
 * 
 * Контроллер страницы товара (/product/1)
 * 
 */

use Model\CategoriesModel;
use Model\ProductsModel;

// подключение моделей.
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';


/**
 * Формируем страницы продукта
 * 
 * @param object $smarty шаблонизатор
 */
function indexAction($smarty): void
{
    $itemId = $_GET['id'] ?? null;
    if (!$itemId) exit;

    // Получаем данные продукта
    $rsProduct = (new ProductsModel)->getProductById($itemId);

    // Получаем все категории
    $rsCategories = (new CategoriesModel)->getAllMainCatsWithChildren();

    // Данные для корзины
    $smarty->assign([
        'itemInCart' => 0,
    ]);

    if (in_array($itemId, $_SESSION['cart'])) {
        $smarty->assign('itemInCart', 1);
    }

    $smarty->assign([
        'pageTitle' => $rsProduct['title'],
        'categories' => $rsCategories,
        'rsProduct' => $rsProduct,
    ]);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'product');
    loadTemplate($smarty, 'footer');
}