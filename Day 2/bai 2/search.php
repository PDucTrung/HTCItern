<?php
include "connect.php";
include "quanly.php";

switch ($_GET["action"]) {
    case 'luong':
        $start = $_POST["valuestart"];
        $end = $_POST["valueend"];
        echo "<script> window.location = 'quanly.php?start=$start&end=$end' </script>";
        break;
}
