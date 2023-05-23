<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "htc_oop_ko_js";

// Kết nối tới cơ sở dữ liệu MySQL
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
?>
