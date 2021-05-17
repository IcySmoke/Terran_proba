<?php

class Model
{

    public static function connect()
    {
        try {
            // set the optional options of the PDO connection. fetch mode to objects
            $options = array(PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ, PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING);

            // generate a database connection, using the PDO connector
            return new PDO(DB_TYPE . ':host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHARSET, DB_USER, DB_PASS, $options);
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }
}
