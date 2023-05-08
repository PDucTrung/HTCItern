<?php
$prev_page = $current_page - 1;
$next_page = $current_page + 1;

//  nếu current_page > 1 và total_page > 1 mới hiển thị nút prev
if ($current_page > 1 && $total_page > 1) {
    echo "<li class='page-item'><a class='page-link'href='quanly.php?pagework=$prev_page'>Prev</a></li>";
}

// Lặp khoảng giữa
for ($i = 1; $i <= $total_page; $i++) {
    if ($i == $current_page) {
        echo "<li class='page-item active'><a class='page-link' href='quanly.php?pagework=$i'>$i</a></li>";
    } else {
        echo "<li class='page-item'><a class='page-link' href='quanly.php?pagework=$i'>$i</a></li>";
    }
}

// nếu current_page < $total_page và total_page> 1 mới hiển thi next
if ($current_page < $total_page && $total_page > 1) {
    echo "<li class='page-item'><a class='page-link'href='quanly.php?pagework=$next_page'>Next</a></li>";
}
