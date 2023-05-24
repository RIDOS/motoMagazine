<?php

/**
 * cartController.php
 * 
 * Контроллер работы с корзиной (/cart/)
 * 
 */

 use Model\CategoriesModel;
 use Model\ProductsModel;
 
 // подключение моделей.
 include_once '../models/CategoriesModel.php';
 include_once '../models/ProductsModel.php';

 /**
  * Добавление продукта в корзину
  *
  * @param integer id GET параметр - ID добавляемого продукта
  * @return json|bool информация об операции (успех, кол-во элементов в корзине)
  */
function addtocartAction()
{
    $itemId = intval($_GET['id']) ?? null;
    if (!$itemId) return false;

    $resData = [];

    if (isset($_SESSION['cart']) && array_search($itemId, $_SESSION['cart']) === false) {
        $_SESSION['cart'][] = $itemId;
        $resData['cntItems'] = count($_SESSION['cart']);
        $resData['success'] = 1;
    } else {
        $resData['success'] = 0;
    }

    echo json_encode($resData);
}


/**
 * Удаляем продукт из корзины
 * 
 * @param integer id GET параметр ID удаляемого из корзины продутка
 * @return json|bool информация об операции (успех, кол-во элементов в корзине)
 */
function removefromcartAction()
{
    $itemId = intval($_GET['id']) ?? null;
    if (! $itemId) return false;

    $resData = [];
    $key = array_search($itemId, $_SESSION['cart']);

    if ($key !== false) {
        unset($_SESSION['cart'][$key]);
        $resData['success'] = 1;
        $resData['cntItems'] = count($_SESSION['cart']);
    } else {
        $resData['success'] = 0;
    }

    echo json_encode($resData);
}

/**
 * Формироование страницы корзины
 * 
 * @link /cart/
 */
function indexAction($smarty)
{
    $itemsIds = $_SESSION['cart'] ?? [];

    $rsCategories = (new CategoriesModel)->getAllMainCatsWithChildren();
    $rsProducts = (new ProductsModel)->getProductsFromArray($itemsIds);

    $smarty->assign([
        'pageTitle' => 'Корзина',
        'categories' => $rsCategories,
        'rsProducts' => $rsProducts,
    ]);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'cart');
    loadTemplate($smarty, 'footer');
}