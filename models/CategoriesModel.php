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
}
