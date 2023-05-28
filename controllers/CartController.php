<?php

/**
 * cartController.php
 * 
 * Контроллер работы с корзиной (/cart/)
 * 
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

/**
 * Формирование страницы заказа
 */
function orderAction($smarty)
{
    $itemsIds = $_SESSION['cart'] ?? null;

    if (!$itemsIds) {
        redirect('/?controller=cart');
        return;
    }

    // Получаем из массива $_POST кол-во покупаеммых товаров
    $itemsCnt = [];
    foreach($itemsIds as $item)
    {
        $postVar = 'itemCnt_' . $item;

        $itemsCnt[$item] = $_POST[$postVar] ?? null;
    }

    // Получаем список продуктов по массиву корзины
    $rsProducts = (new ProductsModel())->getProductsFromArray($itemsIds);

    $i = 0;
    foreach($rsProducts as &$item)
    {
        $item['cnt'] = $itemsCnt[$item['id']] ?? 0;
        if ($item['cnt']) {
            $item['realPrice'] = $item['cnt'] * $item['price'];
        } else {
            unset($rsProducts[$i]);
        }
        $i++;
    }

    if (! $rsProducts) {
        echo "Корзина пуста";
        return;
    }

    $_SESSION['saleCart'] = $rsProducts;

    $rsCategories = (new CategoriesModel())->getAllMainCatsWithChildren();

    if (! isset($_SESSION['user'])) {
        $smarty->assign('hideLoginBox', 1);
    }

    $smarty->assign([
        'pageTitle' => 'Заказ',
        'categories' => $rsCategories,
        'rsProducts' => $rsProducts,
    ]);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'order');
    loadTemplate($smarty, 'footer');
}

/**
 * AJAX функция сохранениня заказа
 * 
 *  @param array $_SESSION['saleCArt'] массив покупаемых продуктов
 *  @return json информация о резултате выполнения
 */
function saveorderAction()
{
    $cart = $_SESSION['saleCart'] ?? null;

    if (!$cart) {
        $resData['success'] = 0;
        $resData['message'] = 'Нет товара для заказа';
        echo json_encode($resData);
        return;
    }

    $name = $_POST['name'] ?? null;
    $phone = $_POST['phone'] ?? null;
    $adress = $_POST['adress'] ?? null;

    $orderId = (new OrdersModel())->makeNewOrder($name, $phone, $adress);

    if (!$orderId) {
        $resData['success'] = 0;
        $resData['message'] = 'Ошибка создания заказа';
        echo json_encode($resData);
        return;
    }

    $res = (new PurchaisesModel())->setPurchaseForOrder($orderId, $cart);

    if (! $res) {
        $resData['success'] = 0;
        $resData['message'] = "Ошибка внесения данных для заказа #$orderId";
        echo json_encode($resData);
        return;
    } else {
        $resData['success'] = 1;
        $resData['message'] = 'Заказ сохранен';
        unset($_SESSION['saleCart']);
        unset($_SESSION['cart']);
    }

    echo json_encode($resData);
}