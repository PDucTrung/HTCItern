<?php
include "connect.php";

if (isset($_POST["adddev"])) {
    $staffid = $_POST["staffid"];
    $ten = $_POST["ten"];
    $tuoi = $_POST["tuoi"];
    $diachi = $_POST["diachi"];
    $ngaysinh = $_POST["ngaysinh"];
    $sonamkinhnghiem = $_POST["sonamkinhnghiem"];
    $nnlt = $_POST["ngonngulaptrinh"];
    $selectdev = $_POST["selectdev"];

    echo $level;
    if ($level == "" || $hsluong == "") {
        echo '<script> alert("bạn vui lòng nhập đầy đủ thông tin"); </script>';
        echo '<script> window.location = "quanly.php"; </script>';
    } else {
        $sql = "SELECT * FROM staff WHERE StaffID='$staffid'";
        $kt = mysqli_query($conn, $sql);
        echo '<script> alert("Data Saved"); </script>';
        if (mysqli_num_rows($kt)  > 0) {
            echo '<script> alert("Level đã tồn tại"); </script>';
            echo '<script> window.location = "quanly.php"; </script>';
        } else {
            $sql = "INSERT INTO soefficientsalary VALUES ('$level','$hsluong')";
            mysqli_query($conn, $sql);
            echo '<script> alert("Data Saved"); </script>';
            header("location: quanly.php");
        }
    }
}
