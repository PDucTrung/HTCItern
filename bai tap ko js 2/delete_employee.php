<?php
require_once "db_connect.php";

// Lấy thông tin nhân viên từ yêu cầu POST
$name = $_POST["name"];

// Thực hiện truy vấn để xóa nhân viên từ bảng "nhan_vien"
$sql = "DELETE FROM nhan_vien WHERE name = '$name'";
$conn->query($sql);

$conn->close();
?>
