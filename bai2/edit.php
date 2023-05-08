<?php
include "database.php";

class edit extends Database
{
    public function __construct()
    {
        parent::__construct();
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

                $staff = new database();
                $dev = new database();
                if ($staffid == "" || $ten == "" || $tuoi == "" || $diachi == "" || $ngaysinh == "" || $sonamkinhnghiem == "" || $luongcoban == "" || $nnlt == "" || $selectlevel == "") {
                    echo '<script> alert("bạn vui lòng nhập đầy đủ thông tin"); </script>';
                    echo "<script> window.location = 'quanly.php' </script>";
                } else {
                    $staff->update('staff', ['ten' => $ten, 'tuoi' => $tuoi, 'diachi' => $diachi, 'ngaysinh' => $ngaysinh, 'namkinhnghiem' => $sonamkinhnghiem, 'luongcoban' => $luongcoban], "StaffID= '$staffid'");
                    $dev->update('devloper', ['language' => $nnlt, 'level' => $selectlevel], "staffid= '$staffid'");
                    if ($staff && $dev) {
                        header('location:quanly.php');
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

                $staff = new database();
                $manager = new database();
                if ($staffid == "" || $ten == "" || $tuoi == "" || $diachi == "" || $ngaysinh == "" || $sonamkinhnghiem == "" || $luongcoban == "" || $selectlevel == "") {
                    echo '<script> alert("bạn vui lòng nhập đầy đủ thông tin"); </script>';
                    echo "<script> window.location = 'quanly.php' </script>";
                } else {
                    $staff->update('staff', ['ten' => $ten, 'tuoi' => $tuoi, 'diachi' => $diachi, 'ngaysinh' => $ngaysinh, 'namkinhnghiem' => $sonamkinhnghiem, 'luongcoban' => $luongcoban], "StaffID= '$staffid'");
                    $manager->update('manager', ['level' => $selectlevel], "staffid= '$staffid'");
                    if ($staff && $manager) {
                        header('location:quanly.php');
                    }
                }
                break;
            case 'editwork':
                $staffid = $_POST["staffid"];
                $sogio = $_POST["sogio"];
                $thang = $_POST["thang"];
                $nam = $_POST["nam"];

                $work = new database();
                if ($staffid == "" || $sogio == "" || $thang == "" || $nam == "") {
                    echo '<script> alert("bạn vui lòng nhập đầy đủ thông tin"); </script>';
                    echo "<script> window.location = 'quanly.php' </script>";
                } else {
                    $work->update('work', ['sogio' => $sogio, 'thang' => $thang, 'nam' => $nam], "StaffID= '$staffid'");
                    if ($work) {
                        header('location:quanly.php');
                    }
                }
                break;
            case 'editsalary':
                $staffid = $_POST["staffid"];
                $hesoluong = $_POST["hesoluong"];

                $salary = new database();
                if ($staffid == "" || $hesoluong == "") {
                    echo '<script> alert("bạn vui lòng nhập đầy đủ thông tin"); </script>';
                    echo "<script> window.location = 'quanly.php' </script>";
                } else {
                    $salary->update('soefficientsalary', ['hesoluong' => $hesoluong], "StaffID= '$staffid'");
                    if ($salary) {
                        header('location:quanly.php');
                    }
                }
                break;
        }
    }
}

new edit();
