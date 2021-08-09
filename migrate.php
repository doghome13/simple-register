<?php

include_once 'service/databaseService.php';

class migrate
{
    const DATABASE_NAME = 'simple_register';

    public function __construct($query)
    {
        $this->query = $query;
        $this->database = new \service\database();
        // $this->database->setConnect()->test();
    }

    public function get()
    {
        $this->createDB();

        $conn = $this->database->setConnect(static::DATABASE_NAME)->getConnect();
        $sql = "CREATE TABLE members (
            id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(30) NOT NULL,
            password VARCHAR(30) NOT NULL,
            created_at TIMESTAMP
            )";

        if ($conn->query($sql) === TRUE) {
            print_r("members 創建成功");
            echo '<br />';
        } else {
            die("Error creating table: " . $conn->error);
        }

        $conn->close();
    }

    private function createDB()
    {
        $conn = $this->database->setConnect()->getConnect();
        $sql = "CREATE DATABASE IF NOT EXISTS `" . static::DATABASE_NAME . "`";

        if ($conn->query($sql) === TRUE) {
            print_r(static::DATABASE_NAME . " 創建成功");
            echo '<br />';
        } else {
            die("Error creating database: " . $conn->error);
        }

        $conn->close();
    }
}
