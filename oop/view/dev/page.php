<?php


$sql = "SELECT COUNT(StaffID) AS total FROM devloper";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];

$current_page = isset($_GET['pagedev']) ? $_GET['pagedev'] : 1;
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
$devdata = mysqli_query($conn, "SELECT devloper.StaffID,staff.ten,staff.tuoi,staff.diachi,staff.ngaysinh,staff.namkinhnghiem,staff.luongcoban,devloper.language,devloper.level, 
                            staff.luongcoban + (work.sogio * 50000) * soefficientsalary.hesoluong AS 'luong' 
                            FROM Staff INNER JOIN devloper on Staff.StaffID = devloper.StaffID 
                            INNER JOIN work ON devloper.StaffID = work.StaffID 
                            INNER JOIN soefficientsalary on devloper.StaffID = soefficientsalary.StaffID 
                            LIMIT $start, $limit");
