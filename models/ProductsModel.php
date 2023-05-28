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
     * @param integer $offset Количество товаров
     * @param integer $limit Лимит товаров
     * @return array|bool Массив товаров
     */
    public function getLastProducts(int $offset = 1,int $limit = 0): array|bool
    {
        $sql = "
            SELECT count(id) as cnt FROM products
        ";
        $rs = $this->db->query($sql);
        $cnt = createSmartyRsArray($rs);

        $sql = "
            SELECT *
            FROM products
            WHERE status = 1
            ORDER BY id DESC
        ";

        $sql .= " LIMIT $offset, $limit";

        $result = $this->db->query($sql);
        $rows = createSmartyRsArray($result);

        return [$rows, $cnt[0]['cnt']];
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

    public function getProducts()
    {
        $sql = "
            SELECT *
            FROM `products`
            ORDER BY `id_category`
        ";

        $rs = $this->db->query($sql);

        return createSmartyRsArray($rs);
    }

    public function instertProduct($itemName, $itemPrice, $itemDesc, $itemCat)
    {
        $sql = "
            INSERT INTO `products`
                (`title`, `about`, `price`, `id_category`, `img`, `date_create`) 
            VALUES 
                ('$itemName','$itemDesc','$itemPrice','$itemCat', 'default.avif', NOW())
        ";

        $rs = $this->db->query($sql) ?? false;

        return $rs;
    }

    /**
     * Обновить описание продукта.
     * 
     * @param int $itemId - ID продукта
     * @param string $itemName - Наименование продукта
     * @param float $itemPrice - Цета продукта
     * @param int $itemStatus - Статус продажи продукта
     * @param string $itemDesc - Описание продукта
     * @param int $itemCat - ID категории
     * @param string $newFileName - Фотография продукта
     * 
     * @return array Информация о выполненном запросе
     */
    public function updateProducts(
        int $itemId, $itemName, $itemPrice,
        $itemStatus, $itemDesc, $itemCat,
        string $newFileName = null
    )
    {
        $set = [];

        if ($itemName) {
            $set[] = "`title` = '$itemName'";
        }

        if ($itemPrice > 0) {
            $set[] = "`price` = '$itemPrice'";
        }

        if ($itemStatus !== null) {
            $set[] = "`status` = '$itemStatus'";
        }

        if ($itemDesc) {
            $set[] = "`about` = '$itemDesc'";
        }

        if ($itemCat) {
            $set[] = "`id_category` = '$itemCat'";
        }

        if ($newFileName) {
            $set[] = "`img` = '$newFileName'";
        }

        $setStr = implode(', ', $set);

        $sql = "
            UPDATE products
            SET $setStr
            WHERE id = $itemId
        ";

        $rs = $this->db->query($sql);

        return $rs;
    }

    /**
     * Загрузка записи о добавление фотографии товару
     * 
     * @param integer $itemId ID файла
     * @param string $newFileName Наименование файла
     * 
     * @return 
     */
    public function updateProductImage($itemId, $newFileName)
    {
        $rs = $this->updateProducts($itemId, null, null, null, null, null, $newFileName);

        return $rs;
    }
}
  