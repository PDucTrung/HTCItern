<?php
$prev_page = $current_page - 1;
$next_page = $current_page + 1;
$slug = "valuestart=$valuestart&valueend=$valueend&column=$column&order=$sort_order&search=$search";

if ($current_page > 1 && $total_page > 1) {
    echo "<li class='page-item'>
    <a class='page-link'href='quanly.php?pagethongke=$prev_page&$slug'>
    Prev
    </a>
    </li>";
}

for ($i = 1; $i <= $total_page; $i++) {
    if ($i == $current_page) {
        echo "<li class='page-item active'>
        <a class='page-link' 
        href='quanly.php?pagethongke=$i&$slug'>
        $i
        </a>
        </li>";
    } else {
        echo "<li class='page-item'>
        <a class='page-link' href='quanly.php?pagethongke=$i&$slug'>
        $i
        </a>
        </li>";
    }
}

if ($current_page < $total_page && $total_page > 1) {

    echo "<li class='page-item'>
    <a class='page-link'href='quanly.php?pagethongke=$next_page&$slug'>
    Next
    </a>
    </li>";
}
