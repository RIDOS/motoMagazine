<?php

/**
 * Контроллер функции пользователя
 * 
 * 
 */

use Model\CategoriesModel;
use Model\UsersModel;
use Model\OrdersModel;
use Model\PurchaisesModel;

// подключение моделей.
include_once '../models/CategoriesModel.php';
include_once '../models/UsersModel.php';
include_once '../models/PurchaisesModel.php';
include_once '../models/OrdersModel.php';


/**
 * Формирование главной страницы пользователя
 * 
 * @link /user/
 * @param object $smarty шаблонизатор
 */
function indexAction($smarty)
{
    // Если пользователь не залогинен, то редирект на главную старницу
    if (! isset($_SESSION['user'])) {
        redirect('/');
    }

    // Получение списка категорий для меню
    $rsCategories = (new CategoriesModel)->getAllMainCatsWithChildren();

    // Получение списка заказов пользователя
    $rsUserOrders = (new UsersModel())->getCurUserOrders();

    $smarty->assign([
        'pageTitle' => 'Страница пользователя',
        'categories' => $rsCategories,
        'rsUserOrders' => $rsUserOrders,
    ]);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'user');
}

/**
 * Обновление данных пользователя
 * 
 * @return json результат выполнения функции
 */
function updateAction()
{
    // Если пользователь не залогинен, то редирект на главную старницу
    if (! isset($_SESSION['user'])) {
        redirect('/');
    }

    $resData = [];
    $phone = $_REQUEST['phone'] ?? '-';
    $adress = $_REQUEST['adress'] ?? '-';
    $name = $_REQUEST['name'] ?? '-';
    $pwd1 = $_REQUEST['pwd1'] ?? '-';
    $pwd2 = $_REQUEST['pwd2'] ?? '-';
    $curPwd = $_REQUEST['curPwd'] ?? '-';

    $curPwdMD5 = md5($curPwd);

    if (!$curPwd || ($_SESSION['user']['pwd'] != $curPwdMD5)) {
        $resData['success'] = 0;
        $resData['message'] = 'Текущий пароль не верный';
        echo json_encode($resData);
        return false;
    }
    
    $res = (new UsersModel)->updateUserData($name, $phone, $adress, $pwd1, $pwd2, $curPwdMD5);
    if ($res) {
        $resData['success'] = 1;
        $resData['message'] = 'Данные сохранены';
        $resData['userName'] = $name;

        $_SESSION['user']['name'] = $name;
        $_SESSION['user']['phone'] = $phone;
        $_SESSION['user']['adress'] = $adress;
        $newPwd = $_SESSION['user']['pwd'];
        if ($pwd1  && ($pwd1 == $pwd2)) {
            $newPwd = md5(trim($pwd1));
        }
        $_SESSION['user']['pwd'] = $newPwd;
        $_SESSION['user']['displayName'] = $name == '' ? $_SESSION['user']['email'] : $name;
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Ошибка сохраненных данных';
    }

    echo json_encode($resData);
}

/**
 * AJAX регистрация пользователя
 * Инициализация сессионной переменной ($_SESSION['user'])
 * 
 * @return json массив данных нового пользователя
 */
function registerAction()
{
    $email = $_REQUEST['email'] ?? null;
    $email = trim($email);

    $pwd1 = $_REQUEST['pwd1'] ?? null;
    $pwd2 = $_REQUEST['pwd2'] ?? null;

    $phone = $_REQUEST['phone'] ?? '-';
    $adress = $_REQUEST['adress'] ?? '-';
    $name = $_REQUEST['name'] ?? '-';
    $name = trim($name);

    $resData = null;
    $resData = (new UsersModel)->checkregisterParams($email, $pwd1, $pwd2);

    if (!$resData && (new UsersModel)->checkUserEmail($email)) {
        $resData['success'] = 0;
        $resData['message'] = 'Пользователь с таким e-mail уже зарегистирован';
    }

    if (! $resData) {
        $pwdMD5 = md5($pwd1);

        $userData = (new UsersModel)->registerNewUser($email, $pwdMD5, $name, $phone, $adress);
        if ($userData['success']) {
            $resData['success'] = 1;
            $resData['message'] = 'Пользователь успешно зарегистирован';

            $userData = $userData[0];
            $resData['userName'] = $userData['name'] == '0' ? $userData['email'] : $userData['name'];
            $resData['email'] = $email;


            $_SESSION['user'] = $userData;
            $_SESSION['user']['displayName'] = $userData['name'] == '-' ? $userData['email'] : $userData['name'];
        } else {
            $resData['success'] = 0;
            $resData['message'] = 'Ошибка регистрации';
        }
    }

    echo json_encode($resData);
}


/**
 * Разлогирование пользователя
 */
function logoutAction()
{
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
        unset($_SESSION['cart']);
    }

    redirect('/');
}

/**
 * AJAX авторизация пользователя
 * 
 * @return json массив данных нового пользователя
 */
function loginAction()
{
    $email = $_REQUEST['email'] ?? null;
    $email = trim($email);

    $pwd = $_REQUEST['pwd'] ?? null;
    $pwd = trim($pwd);

    $userData = (new UsersModel())->loginUser($email, $pwd);

    if ($userData['success']) {
        $userData = $userData[0];

        $_SESSION['user'] = $userData;
        $_SESSION['user']['displayName'] = $userData['name'] == '0' ? $userData['email'] : $userData['name'];

        $resData = $_SESSION['user'];
        $resData['success'] = 1;
    } else {
        $resData['success'] = 0;
        $resData['message'] = 'Невырный логин или пароль';
    }

    echo json_encode($resData);
}