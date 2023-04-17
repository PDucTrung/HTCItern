<?php
include "connect.php";
include "quanly.php";

switch ($_GET["action"]) {
    case 'editdev':
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
            $sql = "SELECT * FROM devloper WHERE StaffID='$staffid'";
            $kt = mysqli_query($conn, $sql);
            if (mysqli_num_rows($kt)  == 0) {
                echo '<script> alert("ID không không tại"); </script>';
            } else {
                $staff = "UPDATE staff SET ten='$ten', tuoi='$tuoi', diachi='$diachi', ngaysinh='$ngaysinh', luongcoban='$luongcoban', namkinhnghiem='$sonamkinhnghiem' WHERE StaffID='$staffid'";
                $dev = "UPDATE devloper SET language='$nnlt', level='$selectlevel' WHERE StaffID='$staffid'";
                mysqli_query($conn, $staff);
                mysqli_query($conn, $dev);
                echo '<script> alert("Data Saved"); </script>';
                echo "<script> window.location = 'quanly.php' </script>";
            }
        }
        break;

    case 'editmanager':
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
            $sql = "SELECT * FROM manager WHERE StaffID='$staffid'";
            $kt = mysqli_query($conn, $sql);
            if (mysqli_num_rows($kt)  == 0) {
                echo '<script> alert("ID không không tại"); </script>';
            } else {
                $staff = "UPDATE staff SET ten='$ten', tuoi='$tuoi', diachi='$diachi', ngaysinh='$ngaysinh', luongcoban='$luongcoban', namkinhnghiem='$sonamkinhnghiem' WHERE StaffID='$staffid'";
                $manager = "UPDATE manager SET level='$selectlevel' WHERE StaffID='$staffid'";
                mysqli_query($conn, $staff);
                mysqli_query($conn, $manager);
                echo '<script> alert("Data Saved"); </script>';
                echo "<script> window.location = 'quanly.php' </script>";
            }
        }
        break;

    case 'editwork':
        $staffid = $_POST["staffid"];
        $sogio = $_POST["sogio"];
        $thang = $_POST["thang"];
        $nam = $_POST["nam"];

        if ($staffid == "" || $sogio == "" || $thang == "" || $nam == "") {
            echo '<script> alert("bạn vui lòng nhập đầy đủ thông tin"); </script>';
        } else {
            $sql = "SELECT * FROM work WHERE StaffID='$staffid'";
            $kt = mysqli_query($conn, $sql);
            if (mysqli_num_rows($kt)  == 0) {
                echo '<script> alert("ID không tồn tại"); </script>';
            } else {
                $sql = "UPDATE work SET sogio='$sogio', thang='$thang', nam='$nam' WHERE StaffID='$staffid'";
                mysqli_query($conn, $sql);
                echo '<script> alert("Data Saved"); </script>';
                echo "<script> window.location = 'quanly.php' </script>";
            }
        }
        break;

    case 'editsalary':
        $staffid = $_POST["staffid"];
        $hesoluong = $_POST["hesoluong"];

        if ($staffid == "" || $hesoluong == "") {
            echo '<script> alert("bạn vui lòng nhập đầy đủ thông tin"); </script>';
        } else {
            $sql = "SELECT * FROM soefficientsalary WHERE StaffID='$staffid'";
            $kt = mysqli_query($conn, $sql);
            if (mysqli_num_rows($kt)  == 0) {
                echo '<script> alert("ID Không tồn tại"); </script>';
            } else {
                $sql = "UPDATE soefficientsalary SET hesoluong='$hesoluong' WHERE StaffID='$staffid'";
                mysqli_query($conn, $sql);
                echo '<script> alert("Data Saved"); </script>';
                echo "<script> window.location = 'quanly.php' </script>";
            }
        }
        break;
}
