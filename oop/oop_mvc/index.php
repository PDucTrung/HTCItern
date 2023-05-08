<?php
// conn
include_once "config.php";

// model
$import_model = ["controller", "model"];
foreach ($import_model as $item) {
    include_once "model/$item.php";
}

// class oop
$import_oop = ["calculatepay", "person", "developer", "managerProduct", "language"];
foreach ($import_oop as $item) {
    include_once "public/oop/$item.php";
}

// controller
$controller = "";
$controller = isset($_GET["controller"]) ? "controller/controller_" . $_GET["controller"] . ".php" : null;

// view
include_once "view/view_layout.php";
