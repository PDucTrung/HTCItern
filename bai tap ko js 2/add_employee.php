<?php
require_once "db_connect.php";

// Lấy thông tin nhân viên từ yêu cầu POST
$name = $_POST["name"];
$age = $_POST["age"];
$job = $_POST["job"];

// Thực hiện truy vấn để thêm nhân viên vào bảng "nhan_vien"
$sql = "INSERT INTO nhan_vien (name, age, job) VALUES ('$name', '$age', '$job')";
$conn->query($sql);

$conn->close();
?>
