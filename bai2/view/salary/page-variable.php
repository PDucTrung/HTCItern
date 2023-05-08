<?php
$current_page = isset($_GET['pagesalary']) ? $_GET['pagesalary'] : 1;

$total_page = $db->get_total_page("soefficientsalary");

$soefficientsalarydata = $db->get_data('soefficientsalary', $current_page);
