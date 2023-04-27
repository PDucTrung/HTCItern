<?php
$current_page = isset($_GET['pagedev']) ? $_GET['pagedev'] : 1;

$limit = 3;

$total_page = $db->get_total_page("devloper", $limit);

$devdata = $db->get_data('devloper', $current_page, $limit);
