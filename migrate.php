<?php

namespace App;

use \App\service\database;

include_once 'service/databaseService.php';

class migrate
{
    const DATABASE_NAME = 'simple_register';

    public function __construct($query)
    {
        $this->query = $query;
        $this->database = new database();
        // $this->database->setConnect()->test();
    }

    public function get()
    {
        $this->createDB();

        $sql = "CREATE TABLE members (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(30) NOT NULL,
            password VARCHAR(255) NOT NULL,
            created_at TIMESTAMP
            )";
        $this->database->setConnect(static::DATABASE_NAME)->run($sql);

        //
        print_r("members 創建成功");
        echo '<br />';
    }

    private function createDB()
    {
        $sql = "CREATE DATABASE IF NOT EXISTS `" . static::DATABASE_NAME . "`";
        $this->database->setConnect()->run($sql);

        //
        print_r(static::DATABASE_NAME . " 創建成功");
        echo '<br />';
    }
}
