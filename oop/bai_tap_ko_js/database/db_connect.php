<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "htc_oop_ko_js";

// Kết nối cơ sở dữ liệu
$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
