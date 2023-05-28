<?php

/**
 * 
 * 
 * Модель для таблицы заказов (sales)
 */


namespace Model;

use DataBases\connectToDB;
use mysqli;


class OrdersModel
{
    /**
     * Подключение БД.
     *
     * @var \mysqli|false
     */
    private mysqli|false $db;

    public function __construct()
    {
        $this->db = (new connectToDB())->db;
    }

    /**
     * Создание заказа (без привязки товара)
     * 
     * @param string $name
     * @param string $phone
     * @param string $adress
     * @return integer ID созданного заказа
     */
    public function makeNewOrder(string $name, string $phone, string $adress): int|bool
    {
        $name = htmlspecialchars(mysqli_real_escape_string($this->db, $name));
        $phone = htmlspecialchars(mysqli_real_escape_string($this->db, $phone));
        $adress = htmlspecialchars(mysqli_real_escape_string($this->db, $adress));

        $userId = $_SESSION['user']['id'];
        $comment = "id пользователя: $userId\n
                    Имя: $name\n
                    Тел: $phone\n
                    Адрес: $adress";

        $dateCreate = date('Y.m.d H:i:s');

        $userIp = $_SERVER['REMOTE_ADDR'];


        $sql = "
            INSERT INTO 
            `sales`(`id_user`, `date_create`, `date_payment`, 
                    `status`, `comment`, `user_ip`) 
            VALUES ('$userId','$dateCreate', null,'0',
                    '$comment','$userIp')
        ";

        $rs = $this->db->query($sql);
        
        if (($id = $this->db->insert_id)) {
            return $id;
        } 
        return false;
    }

    /**
     * Получить список заказов с привзякой к продуктам для пользователя $userId
     * 
     * @param integer $userId ID пользователя
     * @return array массив заказов с привзяков к продуктам
     */
    public function getOrdersWithProductsByUser(int $userId): array
    {
        $sql = "
            SELECT * FROM `sales`
            WHERE `id_user` = '$userId'
            ORDER BY id DESC
        ";

        $rs = $this->db->query($sql);

        $smartyRs = [];

        while ($row = mysqli_fetch_assoc($rs)) {
            $rsChildren = (new PurchaisesModel())->getPurchaseForOrder($row['id']);

            if ($rsChildren) {
                $row['children'] = $rsChildren;
                $smartyRs[] = $row;
            }
        }

        return $smartyRs;
    }
}
