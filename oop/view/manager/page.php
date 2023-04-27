<?php
$current_page = isset($_GET['pagemanager']) ? $_GET['pagemanager'] : 1;

$limit = 3;

$total_page = $db->get_total_page("manager", $limit);

$managerdata = $db->get_data('manager', $current_page, $limit);
