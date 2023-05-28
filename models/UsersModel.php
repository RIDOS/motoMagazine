<?php

/**
 * Модель для таблцы пользователей (users)
 * 
 */

 namespace Model;

 use DataBases\connectToDB;
 use mysqli;

 class UsersModel
{
    /**
     * Подключение БД.
     *
     * @var \mysqli|false
     */
    private mysqli|false $db;

    public function __construct() {
       $this->db = (new connectToDB())->db;
    }

    /**
     * Регистрация нового пользователя
     * 
     * @param string $email почта
     * @param string $pwdMD5 пароль зашифрованный в MD5
     * @param string $name имя пользователя
     * @param string $phone телефон
     * @param string $adress адрес пользователя
     * @return array|int массив данных нового пользователя
     */
    public function registerNewUser(
        string $email, 
        string $pwdMD5, 
        string $name, 
        string $phone,
        string  $adress): array|int
    {
        $email = htmlspecialchars(mysqli_real_escape_string($this->db, $email));
        $pwdMD5 = htmlspecialchars(mysqli_real_escape_string($this->db, $pwdMD5));
        $name = htmlspecialchars(mysqli_real_escape_string($this->db, $name));
        $phone = htmlspecialchars(mysqli_real_escape_string($this->db, $phone));
        $adress = htmlspecialchars(mysqli_real_escape_string($this->db, $adress));

        $sql = "
            INSERT INTO `users`(`email`, `pwd`, `name`, `phone`, `adress`) 
            VALUES ('$email','$pwdMD5','$name','$phone','$adress')
        ";

        $rs = $this->db->query($sql);

        if (isset($rs)) {
            $sql = "
                SELECT *
                FROM users
                WHERE (`email` = '$email' AND `pwd` = '$pwdMD5')
                LIMIT 1
            ";

            $rs = $this->db->query($sql);
            $rs = createSmartyRsArray($rs);

            $rs['success'] = 1;
        } else {
            $rs['success'] = 0;
        }

        return $rs;
    }

    /**
     * Проверка параметров для регистрации пользователя
     * 
     * @param strign $email
     * @param strign $pwd1
     * @param  strign $pwd2
     * @return array|bool результат
     */
    public function checkregisterParams(string $email, string $pwd1, string $pwd2): array|bool
    {
        $res = null;

        if (!$email) {
            $res['success'] = false;
            $res['message'] = 'Введите e-mail';
        }

        if (!$pwd1) {
            $res['success'] = false;
            $res['message'] = 'Введите пароль';
        }

        if (!$pwd2) {
            $res['success'] = false;
            $res['message'] = 'Введите повторно пароль';
        }

        if ($pwd2 != $pwd1) {
            $res['success'] = false;
            $res['message'] = 'Пароли не совпадают';
        }


        return $res ?? false;
    }

    /**
     * Проверка почты (есть ли $email адрес в БД)
     * 
     * @param string $email
     * @return array массив - строка из таблицы users, либо пустой массив
     */
    public function checkUserEmail(string $email): array
    {
        $email = mysqli_real_escape_string($this->db, $email);
        $sql = "SELECT id FROM users WHERE email = '$email'";

        $rs = $this->db->query($sql);
        $rs = createSmartyRsArray($rs);

        return $rs;
    }

    /**
     * Авторизация пользоватедя
     * 
     * @param string $email почта (логин)
     * @param string $pwd пароль
     * @return array массив данных пользователя
     */
    public function loginUser($email, $pwd): array
    {
        $email = htmlspecialchars(mysqli_real_escape_string($this->db, $email));
        $pwd = md5($pwd);

        $sql = "
            SELECT *
            FROM users
            WHERE (`email` = '$email' AND `pwd` = '$pwd')
        ";

        $rs = $this->db->query($sql);

        $rs = createSmartyRsArray($rs);

        if (isset($rs[0])) {
            $rs['success'] = 1;
        }
        else {
            $rs['success'] = 1;
        }

        return $rs;
    }

    /**
     * Изменение данных пользователя
     * 
     * @param string $name имя пользователя
     * @param string $phone телефон
     * @param string $adress адрес
     * @param string $pwd1 новый пароль
     * @param string $pwd2 повтор нового пароля
     * @param string $curPwd текущий пароль
     * @return boolean TRUE в случае успеха
     */
    public function updateUserData(
        string $name,
        string $phone,
        string $adress,
        string $pwd1,
        string $pwd2,
        string $curPwd,
    ): bool
    {
        $email = htmlspecialchars(mysqli_real_escape_string($this->db, $_SESSION['user']['email']));
        $name = htmlspecialchars(mysqli_real_escape_string($this->db, $name));
        $phone = htmlspecialchars(mysqli_real_escape_string($this->db, $phone));
        $adress = htmlspecialchars(mysqli_real_escape_string($this->db, $adress));
        $pwd1 = trim($pwd1);
        $pwd2 = trim($pwd2);

        $newPwd = null;
        if ($pwd1 && ($pwd1 == $pwd2)) {
            $newPwd = md5($pwd1);
        }

        $sql = "
            UPDATE users
            SET 
        ";

        if ($newPwd) {
            $sql .= " `pwd` = '$newPwd', ";
        }

        $sql .= "
            `name` = '$name',
            `phone` = '$phone',
            `adress` = '$adress'
            WHERE
                `email` = '$email' AND `pwd` = '$curPwd'
            LIMIT  1
        ";

        $rs = $this->db->query($sql);

        return $rs;
    }

    /**
     * Получение данных заказа текущего пользователя
     * 
     * @return array массив заказов с привязкой к продуктам
     */
    public function getCurUserOrders()
    {
        $userId = $_SESSION['user']['id'] ?? null;
        $rs = (new OrdersModel())->getOrdersWithProductsByUser($userId);

        return $rs;
    }
}