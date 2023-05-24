<?php

/**
 * Инициализация доключения к БД
 */

namespace DataBases;
use mysqli;

class connectToDB
{
    private string $dblocation = '127.0.0.1';
    private string $dbname = 'db_motomagazine';
    private string $dbuser = 'root';
    private string $dbpassword = 'Password123#@!';
    public mysqli|false $db;

    /**
     *
     */
    function __construct()
    {
        // Соединение с БД.
        if (!$this->db = mysqli_connect($this->dblocation, $this->dbuser, $this->dbpassword))
        {
            echo "Ошибка доступа к MySQL";
            exit();
        }

        // Устанавливаем кодировку по умолчанию для текущего соединения.
        $this->db->set_charset('utf8');

        if (!$this->db->select_db($this->dbname)) {
            echo "Ошибка доступа к базе данных $this->dbname";
            exit();
        }
    }
}
