<?php

/**
 * Class Model
 *
 * Usage:
 * $database = Model::getFactory()->getConnection();
 *
 * @see http://stackoverflow.com/questions/130878/global-or-singleton-for-database-connection
 */

namespace Mini\Core;

use PDO;

class Model
{

    private static $factory;
    private $database;

    public static function getFactory()
    {
        if (!self::$factory) {
            self::$factory = new Model();
        }
        return self::$factory;
    }

    public function getConnection() {
        if (!$this->database) {

            /**
             * Check DB connection in try/catch block. 
             */
            try {
                $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);
                $this->database = new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
            } catch (PDOException $e) {

                // Echo custom message. 
                echo 'Database connection can not be estabilished. Please try again later.' . '<br>';
                echo 'Error code: ' . $e->getCode();

                // No connection, reached limit connections etc. 
                exit;
            }
        }
        return $this->database;
    }
}
