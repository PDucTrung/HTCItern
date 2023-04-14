<?php
include "connect.php";
include "quanly.php";

switch ($_GET["action"]) {
    case 'adddev':
        $staffid = $_POST["staffid"];
        $ten = $_POST["ten"];
        $tuoi = $_POST["tuoi"];
        $diachi = $_POST["diachi"];
        $ngaysinh = $_POST["ngaysinh"];
        $luongcoban = $_POST["luongcoban"];
        $sonamkinhnghiem = $_POST["sonamkinhnghiem"];
        $nnlt = $_POST["ngonngulaptrinh"];
        $selectlevel = $_POST["selectlevel"];

        if ($staffid == "" || $ten == "" || $tuoi == "" || $diachi == "" || $ngaysinh == "" || $sonamkinhnghiem == "" || $luongcoban == "" || $nnlt == "" || $selectlevel == "") {
            echo '<script> alert("bạn vui lòng nhập đầy đủ thông tin"); </script>';
        } else {
            $sql = "SELECT * FROM staff WHERE StaffID='$staffid'";
            $kt = mysqli_query($conn, $sql);
            if (mysqli_num_rows($kt)  > 0) {

                echo '<script> alert("ID đã tồn tại"); </script>';
            } else {
                $staff = "INSERT INTO staff VALUES ('$staffid','$ten','$tuoi','$diachi','$ngaysinh','$sonamkinhnghiem','$luongcoban')";
                $dev = "INSERT INTO devloper VALUES ('$staffid','$nnlt','$selectlevel')";
                mysqli_query($conn, $staff);
                mysqli_query($conn, $dev);

                echo '<script> alert("Data Saved"); </script>';
                echo "<script> window.location = 'quanly.php' </script>";
            }
        }
        break;

    case 'addmanager':
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
        break;

    case 'addwork':
        $staffid = $_POST["staffid"];
        $sogio = $_POST["sogio"];
        $thang = $_POST["thang"];
        $nam = $_POST["nam"];

        if ($staffid == "" || $sogio == "" || $thang == "" || $nam == "") {
            echo '<script> alert("bạn vui lòng nhập đầy đủ thông tin"); </script>';
        } else {
            $sql = "SELECT * FROM work WHERE StaffID='$staffid'";
            $kt = mysqli_query($conn, $sql);
            if (mysqli_num_rows($kt)  > 0) {
                echo '<script> alert("ID đã tồn tại"); </script>';
            } else {
                $sql = "INSERT INTO work VALUES ('$staffid','$sogio','$thang','$nam')";
                mysqli_query($conn, $sql);
                echo '<script> alert("Data Saved"); </script>';
                echo "<script> window.location = 'quanly.php' </script>";
            }
        }
        break;

    case 'addsalary':
        $staffid = $_POST["staffid"];
        $hsluong = $_POST["hsluong"];

        if ($staffid == "" || $hsluong == "") {
            echo '<script> alert("bạn vui lòng nhập đầy đủ thông tin"); </script>';
        } else {
            $sql = "SELECT * FROM soefficientsalary WHERE StaffID='$staffid'";
            $kt = mysqli_query($conn, $sql);
            if (mysqli_num_rows($kt)  > 0) {
                echo '<script> alert("ID đã tồn tại"); </script>';
            } else {
                $sql = "INSERT INTO soefficientsalary VALUES ('$staffid','$hsluong')";
                mysqli_query($conn, $sql);
                echo '<script> alert("Data Saved"); </script>';
                echo "<script> window.location = 'quanly.php' </script>";
            }
        }
        break;
}
