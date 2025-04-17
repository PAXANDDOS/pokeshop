<?php

namespace Framework;

/**
 * Contains methods for database manipulations.
 */
class DB
{
    /**
     * Set connection with SQL database using PDO.
     *
     * @return \PDO Reference
     */
    public static function &connect(): \PDO
    {
        $db = NULL;
        if ($db === NULL)
            try {
                $db = new \PDO(DB_CONNECTION . ':host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_DATABASE, DB_USERNAME, DB_PASSWORD);
                $db->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            } catch (\PDOException $e) {
                echo "Connection failed: " . $e->getMessage();
            }
        return $db;
    }
}
