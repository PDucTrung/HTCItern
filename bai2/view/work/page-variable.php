<?php
$current_page = isset($_GET['pagework']) ? $_GET['pagework'] : 1;

$total_page = $db->get_total_page("work");

$workdata = $db->get_data('work', $current_page);
