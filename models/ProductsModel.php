<?php

/**
 * Модель для таблицы продуктции (products)
 */

namespace Model;

use DataBases\connectToDB;
use mysqli;

class ProductsModel
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
     * Получаем последние добавленные товары
     *
     * @param integer $limit Лимит товаров
     * @return array|bool Массив товаров
     */
    public function getLastProducts(int $limit = 0): array|bool
    {
        $sql = "
            SELECT *
            FROM products
            ORDER BY id DESC
        ";

        if ($limit != 0) {
            $sql .= " LIMIT $limit";
        }


        $result = $this->db->query($sql);

        return createSmartyRsArray($result);
    }
}
  