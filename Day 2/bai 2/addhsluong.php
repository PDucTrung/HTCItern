<?php
include "connect.php";

if (isset($_POST["addhsluong"])) {
    $staffid = $_POST["staffid"];
    $hsluong = $_POST["hsluong"];

    if ($staffid == "" || $hsluong == "") {
        echo '<script> alert("bạn vui lòng nhập đầy đủ thông tin"); </script>';
        echo '<script> window.location = "quanly.php"; </script>';
    } else {
        $sql = "SELECT * FROM soefficientsalary WHERE StaffID='$staffid'";
        $kt = mysqli_query($conn, $sql);
        if (mysqli_num_rows($kt)  > 0) {
            echo '<script> alert("Level đã tồn tại"); </script>';
            echo '<script> window.location = "quanly.php"; </script>';
        } else {
            $sql = "INSERT INTO soefficientsalary VALUES ('$staffid','$hsluong')";
            mysqli_query($conn, $sql);
            echo '<script> alert("Data Saved"); </script>';
            header("location: quanly.php");
        }
    }
}
