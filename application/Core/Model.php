<?php

namespace Mini\Core;

use PDO;

class Model
{
    public static $db = null;

    /**
     * Whenever model is created, open a database connection.
     */
    function __construct()
    {
        try {
            if (is_null(self::$db)) {
                $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
                self::$db = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
            }
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }


}
