<?php

$servername = "localhost";
$username = "sinya";
$password = "sinya1234";

$conn = new mysqli($servername, $username, $password);

// 檢測連接
if ($conn->connect_error) {
    die("連接失敗: " . $conn->connect_error);
}
echo "連接成功";
