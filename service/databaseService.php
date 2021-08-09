<?php

namespace service;

use mysqli;

class database
{
    public function __construct()
    {
        $this->servername = "localhost";
        $this->username = "sinya";
        $this->password = "sinya1234";
        $this->port = 3306;
        $this->conn = null;
    }

    /**
     * 設定連線參數
     *
     * @return $this
     */
    public function setConnect($dbName = '')
    {
        $this->conn = new mysqli(
                $this->servername,
                $this->username,
                $this->password,
                $dbName,
                $this->port
            );

        return $this;
    }

    /**
     * 檢測連接
     */
    public function test()
    {
        if ($this->conn->connect_error) {
            die("連接失敗: " . $this->conn->connect_error);
        }
        $this->conn->close();
        print_r("連接成功");
        echo '<br />';
    }

    public function getConnect()
    {
        return $this->conn;
    }
}
