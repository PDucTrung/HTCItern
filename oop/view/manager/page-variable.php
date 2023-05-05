<?php
$current_page = isset($_GET['pagemanager']) ? $_GET['pagemanager'] : 1;

$total_page = $db->get_total_page("manager");

$managerdata = $db->get_data('manager', $current_page);
