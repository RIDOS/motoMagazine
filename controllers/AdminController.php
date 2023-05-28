<?php

/**
 * AdminController.php
 * 
 * Контроллер бэкенда сайта (/admin/)
 */

use Model\CategoriesModel;
use Model\ProductsModel;
use Model\OrdersModel;
use Model\PurchaisesModel;

 // подключение моделей.
include_once '../models/CategoriesModel.php'; // Категории
include_once '../models/ProductsModel.php';   // Товары
include_once '../models/PurchaisesModel.php'; // Заказы и клиенты
include_once '../models/OrdersModel.php';     // Заказы

$smarty->setTemplateDir(TemplateAdminPrefix);
$smarty->assign('templateWebPath', TemplateAdminWebPath);

function indexAction($smarty)
{
    $rsCaterories = (new CategoriesModel())->getAllMainCategories();

    $smarty->assign([
        'pageTitle' => 'Главная страница сайта',
        'rsCaterories' => $rsCaterories
    ]);

    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'admin');
    loadTemplate($smarty, 'adminFooter');
}

function addnewcatAction()
{
    $catName = $_POST['newCategoryName'] ?? null;
    $catParentId = $_POST['generalCatId'] ?? 0;
    $res = (new CategoriesModel())->insertCat($catName, $catParentId);

    if ($res) {
        $resData['success'] = 1;
        $resData['message'] = 'Категоиря добавлена';
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Ошибка добавления категории';
    }

    echo json_encode($resData);
}

function categoryAction($smarty)
{
    $rsCaterories = (new CategoriesModel())->getAllCategories();
    $rsMainCategories = (new CategoriesModel())->getAllMainCategories();

    $smarty->assign([
        'rsCategories' => $rsCaterories,
        'rsMainCategories' => $rsMainCategories,
        'pageTitle' => 'Страница редактирования категорий',
    ]);

    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'adminCategory');
    loadTemplate($smarty, 'adminFooter');
}

function updatecategoryAction()
{
    $itemId = $_POST['itemId'] ?? null;
    $parentId = $_POST['parentId'] ?? null;
    $newName = $_POST['newName'] ?? null;

    $res = (new CategoriesModel())->updateCategoryData($itemId, $parentId, $newName);

    if ($res) {
        $resData['success'] = 1;
        $resData['message'] = 'Категория обнавлена';
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Ошибка изменения данных категории';
    }
    
    echo json_encode($resData);
}

/**
 * Страница управлениня товарами
 * 
 * @param type $smarty
 */
function productsAction($smarty)
{
    $rsCaterories = (new CategoriesModel())->getAllCategories();
    $rsProducts = (new ProductsModel())->getProducts();

    $smarty->assign([
        'rsCaterories' => $rsCaterories,
        'rsProducts' => $rsProducts,
        'pageTitle' => 'Страница редакитрования товаров',
    ]);

    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'adminProducts');
    loadTemplate($smarty, 'adminFooter');
}

function addproductAction()
{
    $itemName = $_POST['itemName'] ?? null;
    $itemPrice = $_POST['itemPrice'] ?? null;
    $itemDesc = $_POST['itemDesc'] ?? null;
    $itemCat = $_POST['itemCatId'] ?? null;

    $res = (new ProductsModel())->instertProduct($itemName, $itemPrice, $itemDesc, $itemCat);

    if ( $res ) {
        $resData['success'] = 1;
        $resData['message'] = 'Изменения успешно внесены';
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Ошибка внесения изменений';
    }

    echo json_encode($resData);
}

function updateproductAction()
{
    $itemId = $_POST['itemId'] ?? null;
    $itemName = $_POST['itemName'] ?? null;
    $itemPrice = $_POST['itemPrice'] ?? null;
    $itemStatus = $_POST['itemStatus'] ?? null;
    $itemDesc = $_POST['itemDesc'] ?? null;
    $itemCat = $_POST['itemCatId'] ?? null;

    $res = (new ProductsModel())->updateProducts(
        $itemId, $itemName, $itemPrice, $itemStatus,
        $itemDesc, $itemCat
    );

    if ($res) {
        $resData['success'] = 1;
        $resData['message'] = 'Изменения успешно внесены';
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Ошибка внесения изменений';
    }

    echo json_encode($resData);
    return;
}

function uploadAction()
{
    $maxSize = 2 * 2024 * 2024;

    $itemId = $_POST['itemId'] ?? null;
    $ext = pathinfo($_FILES['filename']['name'], PATHINFO_EXTENSION);

    $newFileName = $itemId . '.' . $ext;

    if ($_FILES['filename']['size'] > $maxSize)
    {
        echo "Размер файла превышает два мегабайта";
        return;
    }

    if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
        // Если файл загружен то перемещаем его из временной директрии в конечную
        $res = move_uploaded_file($_FILES['filename']['tmp_name'], $_SERVER['DOCUMENT_ROOT'] . '/images/products/' .$newFileName);

        if ($res) {
            $res = (new ProductsModel())->updateProductImage($itemId, $newFileName);

            if ($res) {
                redirect('/?controller=admin&action=products');
            }
        } else {
            echo "Ошибка загрузки файла";
        }
    }
}

function ordersAction($smarty)
{
    $rsOrders = (new OrdersModel())->getOrders();

    $smarty->assign([
        'rsOrders' => $rsOrders,
        'pageTitle' => 'Страница редакитрования товаров',
    ]);

    loadTemplate($smarty, 'adminHeader');
    loadTemplate($smarty, 'adminOrders');
    loadTemplate($smarty, 'adminFooter');
}

function setorderstatusAction()
{
    $itemId = $_POST['itemId'] ?? null;
    $status = $_POST['status'] ?? null;

    $res = (new OrdersModel())->updateOrderStatus($itemId, $status);

    if ($res) {
        $resData['success'] = 1;
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Ошибк установки статуса';
    }

    echo json_encode($resData);
    return;
}

function setorderdatepaymentAction()
{
    $itemId = $_POST['itemId'] ?? null;
    $datePayment = $_POST['datePayment'] ?? null;

    $res = (new OrdersModel())->updateOrderDatePayment($itemId, $datePayment);

    if ($res) {
        $resData['success'] = 1;
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Ошибк установки статуса';
    }

    echo json_encode($resData);
    return;
}