<?php

/**
 * Модель для таблицы категорий (categories)
 */


function getAllMainCatsWithChildren() {
    $db = $GLOBALS['db'];

    $sql = "
        SELECT *
        FROM category
    ";
    $result = $db->query($sql);

    $cats = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $cats[] = $row;
    }
    return $cats;
}
