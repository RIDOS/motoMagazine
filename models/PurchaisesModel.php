<?php

/**
 * Модель для таблтцы продуктов (purchase)
 */


namespace Model;

use DataBases\connectToDB;
use mysqli;


class PurchaisesModel
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
     * Внесение в БД данных продуктов с привязкой к заказу
     * 
     * @param integer $orderId ID заказа
     * @param array $cart массив корзины
     * @return boolean TRUE в случае успешного добавления в БД.
     */
    public function setPurchaseForOrder(int $orderId, array $cart): bool
    {
        $sql = "
        INSERT INTO `purchase`
            (`sales_id`, `prouct_id`, `amount`, `count`) 
        VALUES ";

        $values = [];

        foreach ($cart as $item) {
            $values[] = "('$orderId', '" . $item['id'] . "', '" . $item['price'] . "', '" . $item['cnt'] . "')";
        }

        $sql .= implode(', ', $values);
        $rs = $this->db->query($sql);

        return $rs;
    }

    /**
     * Получение всех товаров заказа
     * 
     * @param integer $salesId ID покупки
     * @return array массив товаров
     */
    public function getPurchaseForOrder(int $salesId): array
    {
        $sql = "
            SELECT `pe`.*, `ps`.title
            FROM purchase AS `pe`
            JOIN products AS `ps` ON `pe`.prouct_id = `ps`.id
            WHERE `pe`.sales_id = $salesId
        ";

        $rs = $this->db->query($sql);
        return createSmartyRsArray($rs);
    }
}
