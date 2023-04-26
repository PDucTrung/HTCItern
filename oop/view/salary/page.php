<?php
$sql = "SELECT COUNT(StaffID) AS total FROM soefficientsalary";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$total_records = $row['total'];

$current_page = isset($_GET['pagesalary']) ? $_GET['pagesalary'] : 1;
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

$soefficientsalarydata = mysqli_query(
    $conn,
    "SELECT devloper.StaffID,devloper.level, soefficientsalary.hesoluong FROM devloper 
                        INNER JOIN soefficientsalary ON devloper.StaffID = soefficientsalary.StaffID 
                        UNION ALL SELECT manager.StaffID,manager.level, soefficientsalary.hesoluong 
                        FROM manager INNER JOIN soefficientsalary ON manager.StaffID = soefficientsalary.StaffID 
                        LIMIT $start, $limit"
);
