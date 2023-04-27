<?php
$current_page = isset($_GET['pagework']) ? $_GET['pagework'] : 1;

$limit = 3;

$total_page = $db->get_total_page("work", $limit);

$workdata = $db->get_data('work', $current_page, $limit);
