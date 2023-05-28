<?php

/**
 * Модель для таблицы категорий (categories)
 */

namespace Model;

use DataBases\connectToDB;
use mysqli;

/**
 * Модель категорий.
 */
class CategoriesModel
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
     * Получение дочерних категорий
     * 
     * @param integer $catId номер категорий
     * @return array подкатегории
     */
    public function getChildrenForCat(int $catId): array|bool
    {
        $sql = "
            SELECT *
            FROM category
            WHERE parent_id = '$catId'
        ";

        $result = $this->db->query($sql);

        return createSmartyRsArray($result);
    }

    /**
     * Получение всех категорий.
     * @return array
     */
    public function getAllMainCatsWithChildren(): array
    {
        $sql = "
            SELECT *
            FROM category
            WHERE parent_id = 0
        ";
        $result = $this->db->query($sql);

        if (!$result) {
            return [];
        }

        $cats = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rsChildren = $this->getChildrenForCat($row['id']);
            
            if ($rsChildren) {
                $row['children'] = $rsChildren;
            }

            $cats[] = $row;
        }

        return $cats;
    }

    /**
     * Получение данных категории по id
     * 
     * @param integer $catId ID категории
     * @return array массив - строка категории
     */
    public function getCatBuId(int $catId): array
    {
        $catId = intval($catId);

        $sql = "
            SELECT *
            FROM category
            WHERE id = '$catId'
        ";

        $rs = $this->db->query($sql);

        return mysqli_fetch_assoc($rs);
    }


    /**
     * Получение всех главынх категорий (категории которые не являются дочерними
     * 
     * @return array массив категорй
     */
    public function getAllMainCategories(): array
    {
        $sql = "
            SELECT *
            FROM `category`
            WHERE `parent_id` = 0
        ";

        $rs = $this->db->query($sql);

        return createSmartyRsArray($rs);
    }

    /**
     * Добавление новой категории
     * 
     * @param strign $catName Название категории
     * @param integer $catParentId ID родительской категории
     * @return integer id новой категории
     */
    public function insertCat(string $catName, int $catParentId = 0): int
    {
        $sql = "
            INSERT INTO 
                `category`(`parent_id`, `title`) 
            VALUES ('$catParentId','$catName')
        ";

        $this->db->query($sql);

        return $this->db->insert_id;
    }


    /**
     * Получить все категории
     * 
     * @return array массив категорий
     */
    public function getAllCategories(): array
    {
        $sql = "
            SELECT * FROM category
            ORDER BY parent_id ASC
        ";

        $rs = $this->db->query($sql);

        return createSmartyRsArray($rs);
    }

    /**
     * Обновление категории
     * 
     * @param integer $itemId ID категории
     * @param integer $parentId ID главной категории
     * @param string $newName новое имя категории
     * @return type
     */
    public function updateCategoryData(int $itemId, int $parentId, string $newName)
    {
        $set = [];

        if ($newName) {
            $set[] = "`title` = '$newName'";
        }

        if ($parentId > -1) {
            $set[] = "`parent_id` = '$parentId'";
        }

        $setStr = implode(', ', $set);

        $sql = "
            UPDATE `category`
            SET $setStr
            WHERE id = '$itemId'
        ";

        $rs = $this->db->query($sql);

        return $rs;
    }
}
