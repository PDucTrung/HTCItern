<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlns";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn) {
    mysqli_query($conn, "SET NAMES 'utf8'");
} else {
    die('Ket noi that bai !');
}
