<?php


$sql = "SELECT COUNT(StaffID) AS total FROM manager";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];

$current_page = isset($_GET['pagemanager']) ? $_GET['pagemanager'] : 1;
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
$managerdata = mysqli_query(
    $conn,
    "SELECT manager.StaffID,staff.ten,staff.tuoi,staff.diachi,staff.ngaysinh,staff.namkinhnghiem,staff.luongcoban,manager.level, 
                        staff.luongcoban + (work.sogio) * (30000 + 50000 * soefficientsalary.hesoluong) AS 'luong' 
                        FROM Staff INNER JOIN manager on Staff.StaffID = manager.StaffID 
                        INNER JOIN work ON manager.StaffID = work.StaffID 
                        INNER JOIN soefficientsalary on manager.StaffID = soefficientsalary.StaffID 
                        LIMIT $start, $limit"
);
