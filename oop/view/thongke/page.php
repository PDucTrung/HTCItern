<?php
$sql = "SELECT COUNT(StaffID) AS total FROM staff";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];

$current_page = isset($_GET['pagethongke']) ? $_GET['pagethongke'] : 1;
$limit = 3;

$total_page = ceil($total_records / $limit);

if ($current_page > $total_page) {
    $current_page = $total_page;
} else if ($current_page < 1) {
    $current_page = 1;
}

$start = ($current_page - 1) * $limit;
$prev_page = $current_page - 1;
$next_page = $current_page + 1;

// sort
$columns = array('ten', 'luong', 'sogio');

$column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];

$sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';
// 


$thongke = mysqli_query($conn, "SELECT staff.ten,work.sogio, 
                        staff.luongcoban + (work.sogio * 50.000) * soefficientsalary.hesoluong AS 'luong' 
                        FROM Staff 
                        INNER JOIN devloper on Staff.StaffID = devloper.StaffID 
                        INNER JOIN work ON devloper.StaffID = work.staffID 
                        INNER JOIN soefficientsalary on devloper.StaffID = soefficientsalary.StaffID 
                        UNION ALL SELECT staff.ten,work.sogio, staff.luongcoban + (work.sogio) * (30.000 + 50.000 * soefficientsalary.hesoluong) AS 'luong' 
                        FROM Staff 
                        INNER JOIN manager on Staff.StaffID = manager.StaffID 
                        INNER JOIN work ON manager.StaffID = work.staffID 
                        INNER JOIN soefficientsalary on manager.StaffID = soefficientsalary.StaffID
                        ORDER BY $column $sort_order
                        LIMIT $start, $limit");
