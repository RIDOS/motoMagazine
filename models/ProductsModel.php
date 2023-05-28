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

    /**
     * Получить продукцию по данной категории
     * 
     * @param int $catId ID категории
     * @return array массив продукции
     */
    public function getProductsByCat(int $catId): array
    {
        $sql = "
            SELECT *
            FROM products
            WHERE id_category = '$catId'
        ";

        $result = $this->db->query($sql);

        return createSmartyRsArray($result);
    }

    /**
     * Получение полной информации о продукте по ID
     * 
     * @param int $itemId ID продукта
     * @return array информация о продукте
     */
    public function getProductById(int $itemId): array
    {
        $sql = "
            SELECT *
            FROM products
            WHERE id = '$itemId'
        ";

        $result = $this->db->query($sql);

        return mysqli_fetch_assoc($result);
    }


    /**
     * Получить список продуктов из массива идентификаторов (ID`s)
     * 
     * @param array $itemIds массив идентификаторов продуктов
     * @return array массив продуктов
     */
    public function getProductsFromArray(array $itemsIds): array
    {
        $strIds = implode(', ', $itemsIds);

        if ($strIds) {
            $sql = "
                SELECT *
                FROM products
                WHERE id IN ($strIds)
            ";

            $result = $this->db->query($sql);

            return createSmartyRsArray($result);
        }
        return [];
    }
}
  