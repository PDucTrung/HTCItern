<?php
// Phân trang
// tìm tổng số records
$sql = "SELECT COUNT(StaffID) AS total FROM work";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];

// LIMIT và CURRENT_PAGE
$current_page = isset($_GET['pagework']) ? $_GET['pagework'] : 1;
$limit = 3;

// tổng số trang
$total_page = ceil($total_records / $limit);

// Giới hạn current_page trong khoảng 1 đến total_page
if ($current_page > $total_page) {
    $current_page = $total_page;
} else if ($current_page < 1) {
    $current_page = 1;
}

// Tìm Start
$start = ($current_page - 1) * $limit;
$prev_page = $current_page - 1;
$next_page = $current_page + 1;

// Có limit và start rồi thì truy vấn CSDL lấy danh sách 
$workdata = mysqli_query($conn, "SELECT * FROM work LIMIT $start, $limit");
