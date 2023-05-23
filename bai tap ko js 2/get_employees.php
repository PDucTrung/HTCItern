<?php
require_once "db_connect.php";

// Lấy danh sách nhân viên từ bảng "nhan_vien"
$sql = "SELECT * FROM nhan_vien";
$result = $conn->query($sql);
$employees = array();
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
    array_push($employees, $row);
  }
}

$conn->close();

// Trả về danh sách nhân viên dưới dạng JSON
echo json_encode($employees);
?>
