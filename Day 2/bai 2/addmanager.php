<?php
include "connect.php";
include "quanly.php";

if (isset($_POST["addmanager"])) {
    $staffid = $_POST["staffid"];
    $ten = $_POST["ten"];
    $tuoi = $_POST["tuoi"];
    $diachi = $_POST["diachi"];
    $ngaysinh = $_POST["ngaysinh"];
    $luongcoban = $_POST["luongcoban"];
    $sonamkinhnghiem = $_POST["sonamkinhnghiem"];
    $selectlevel = $_POST["selectlevel"];

    if ($staffid == "" || $ten == "" || $tuoi == "" || $diachi == "" || $ngaysinh == "" || $sonamkinhnghiem == "" || $luongcoban == "" || $selectlevel == "") {
        echo '<script> alert("bạn vui lòng nhập đầy đủ thông tin"); </script>';
    } else {
        $sql = "SELECT * FROM staff WHERE StaffID='$staffid'";
        $kt = mysqli_query($conn, $sql);
        if (mysqli_num_rows($kt)  > 0) {
            echo '<script> alert("ID đã tồn tại"); </script>';
        } else {
            $staff = "INSERT INTO staff VALUES ('$staffid','$ten','$tuoi','$diachi','$ngaysinh','$sonamkinhnghiem','$luongcoban')";
            $manager = "INSERT INTO manager VALUES ('$staffid','$selectlevel')";
            mysqli_query($conn, $staff);
            mysqli_query($conn, $manager);
            echo '<script> alert("Data Saved"); </script>';
            echo "<script> window.location = 'quanly.php' </script>";
        }
    }
}