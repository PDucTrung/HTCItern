<?php
include_once "model/controller.php";
include_once "model/model.php";
include_once "config.php";
include_once "public/oop/calculatepay.php";
include_once "public/oop/person.php";
include_once "public/oop/developer.php";
include_once "public/oop/managerProduct.php";
include_once "public/oop/language.php";

$controller = "";
$controller = isset($_GET["controller"]) ? "controller/controller_" . $_GET["controller"] . ".php" : null;

include_once "view/view_layout.php";
