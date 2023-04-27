<?php
include 'database.php';
$db = new Database();

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

        $staff = new database();
        $dev = new database();
        if ($staffid == "" || $ten == "" || $tuoi == "" || $diachi == "" || $ngaysinh == "" || $sonamkinhnghiem == "" || $luongcoban == "" || $nnlt == "" || $selectlevel == "") {
            echo '<script> alert("bạn vui lòng nhập đầy đủ thông tin"); </script>';
            echo "<script> window.location = 'quanly.php' </script>";
        } else {
            if (mysqli_num_rows($db->check_id("staff", "*", "StaffID='$staffid'"))  > 0) {

                echo '<script> alert("ID đã tồn tại"); </script>';
                echo "<script> window.location = 'quanly.php' </script>";
            } else {
                $staff->insert('staff', ['StaffID' => $staffid, 'ten' => $ten, 'tuoi' => $tuoi, 'diachi' => $diachi, 'ngaysinh' => $ngaysinh, 'namkinhnghiem' => $sonamkinhnghiem, 'luongcoban' => $luongcoban]);
                $dev->insert('devloper', ['StaffID' => $staffid, 'language' => $nnlt, 'level' => $selectlevel]);
                if ($staff && $dev) {
                    header('location:quanly.php');
                }
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

        $staff = new database();
        $manager = new database();
        if ($staffid == "" || $ten == "" || $tuoi == "" || $diachi == "" || $ngaysinh == "" || $sonamkinhnghiem == "" || $luongcoban == "" || $selectlevel == "") {
            echo '<script> alert("bạn vui lòng nhập đầy đủ thông tin"); </script>';
            echo "<script> window.location = 'quanly.php' </script>";
        } else {
            if (mysqli_num_rows($db->check_id("staff", "*", "StaffID='$staffid'"))  > 0) {
                echo '<script> alert("ID đã tồn tại"); </script>';
                echo "<script> window.location = 'quanly.php' </script>";
            } else {
                $staff->insert('staff', ['StaffID' => $staffid, 'ten' => $ten, 'tuoi' => $tuoi, 'diachi' => $diachi, 'ngaysinh' => $ngaysinh, 'namkinhnghiem' => $sonamkinhnghiem, 'luongcoban' => $luongcoban]);
                $manager->insert('manager', ['StaffID' => $staffid, 'level' => $selectlevel]);
                if ($staff && $manager) {
                    header('location:quanly.php');
                }
            }
        }
        break;

    case 'addwork':
        $staffid = $_POST["staffid"];
        $sogio = $_POST["sogio"];
        $thang = $_POST["thang"];
        $nam = $_POST["nam"];

        $work = new database();
        if ($staffid == "" || $sogio == "" || $thang == "" || $nam == "") {
            echo '<script> alert("bạn vui lòng nhập đầy đủ thông tin"); </script>';
            echo "<script> window.location = 'quanly.php' </script>";
        } else {
            if (mysqli_num_rows($db->check_id("work", "*", "StaffID='$staffid'"))  > 0) {
                echo '<script> alert("ID đã tồn tại"); </script>';
                echo "<script> window.location = 'quanly.php' </script>";
            } else {
                $work->insert('work', ['StaffID' => $staffid, 'sogio' => $sogio, 'thang' => $thang, 'nam' => $nam]);
                if ($work) {
                    header('location:quanly.php');
                }
            }
        }
        break;

    case 'addsalary':
        $staffid = $_POST["staffid"];
        $hsluong = $_POST["hsluong"];

        $salary = new database();
        if ($staffid == "" || $hsluong == "") {
            echo '<script> alert("bạn vui lòng nhập đầy đủ thông tin"); </script>';
            echo "<script> window.location = 'quanly.php' </script>";
        } else {
            if (mysqli_num_rows($db->check_id("soefficientsalary", "*", "StaffID='$staffid'"))  > 0) {
                echo '<script> alert("ID đã tồn tại"); </script>';
                echo "<script> window.location = 'quanly.php' </script>";
            } else {
                $salary->insert('soefficientsalary', ['StaffID' => $staffid, 'hesoluong' => $hsluong]);
                if ($salary) {
                    header('location:quanly.php');
                }
            }
        }
        break;
}
