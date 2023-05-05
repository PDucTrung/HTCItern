<?php
$current_page = isset($_GET['pagethongke']) ? $_GET['pagethongke'] : 1;

$limit = 3;

// sort
$columns = array('ten', 'luong', 'sogio');

$column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];

$sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';

// search
$search = isset($_GET["search"]) && $_GET["search"] != "" ? $_GET["search"] : "sogio";

switch ($search) {
    case "sogio":
        $min = $db->min("work", "sogio");

        $max = $db->max("work", "sogio");
        break;
    case "luong":
        $min = $tk->min_salary();

        $max = $tk->max_salary();
        break;
}

// thong ke
$valuestart = (isset($_GET["valuestart"]) && $_GET["valuestart"] != "" ? $_GET["valuestart"] : $min);

$valueend = (isset($_GET["valueend"]) && $_GET["valueend"] != "" ? $_GET["valueend"] : $max);

$total_page = $tk->get_total_page_thongke($search, $limit, $valuestart, $valueend);

$thongke = $tk->thongke($current_page, $limit, $column, $sort_order, $valuestart, $valueend, $search);
