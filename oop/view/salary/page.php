<?php
$current_page = isset($_GET['pagesalary']) ? $_GET['pagesalary'] : 1;

$limit = 3;

$total_page = $db->get_total_page("soefficientsalary", $limit);

$soefficientsalarydata = $db->get_data('soefficientsalary', $current_page, $limit);
