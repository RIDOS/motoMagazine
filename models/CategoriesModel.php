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
    private function getChildrenForCat(int $catId): array|bool
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
}
