<?php
$current_page = isset($_GET['pagethongke']) ? $_GET['pagethongke'] : 1;

$limit = 3;

$total_page = $db->get_total_page("staff", $limit);

// sort
$columns = array('ten', 'luong', 'sogio');

$column = isset($_GET['column']) && in_array($_GET['column'], $columns) ? $_GET['column'] : $columns[0];

$sort_order = isset($_GET['order']) && strtolower($_GET['order']) == 'desc' ? 'DESC' : 'ASC';

// search
$min = $db->min("work", "sogio");

$max = $db->max("work", "sogio");

$valuestart = (isset($_GET["valuestart"]) && $_GET["valuestart"] != "" ? $_GET["valuestart"] : $min);

$valueend = (isset($_GET["valueend"]) && $_GET["valueend"] != "" ? $_GET["valueend"] : $max);

// 


$thongke = $db->thongke('staff', $current_page, $limit, $column, $sort_order, $valuestart, $valueend);
