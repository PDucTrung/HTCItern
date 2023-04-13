<?php
include "connect.php";

if (isset($_POST["addwork"])) {
    $staffid = $_POST["staffid"];
    $sogio = $_POST["sogio"];
    $thang = $_POST["thang"];
    $nam = $_POST["nam"];

    if ($staffid == "" || $sogio == "" || $thang == "" || $nam == "") {
        echo '<script> alert("bạn vui lòng nhập đầy đủ thông tin"); </script>';
        echo '<script> window.location = "quanly.php"; </script>';
    } else {
        $sql = "SELECT * FROM work WHERE StaffID='$staffid'";
        $kt = mysqli_query($conn, $sql);
        if (mysqli_num_rows($kt)  > 0) {
            echo '<script> alert("ID đã tồn tại"); </script>';
            echo '<script> window.location = "quanly.php"; </script>';
        } else {
            $sql = "INSERT INTO work VALUES ('$staffid','$sogio','$thang','$nam')";
            mysqli_query($conn, $sql);
            echo '<script> alert("Data Saved"); </script>';
            header("location: quanly.php");
        }
    }
}
