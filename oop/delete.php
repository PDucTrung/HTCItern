<?php
include "database.php";

class delete extends Database
{
    public function __construct()
    {
        parent::__construct();
        switch ($_GET["action"]) {
            case 'deletedev':
                $staffid = $_POST["deletedev_id"];

                $staff = new database();
                $dev = new database();

                $staff->delete('staff', "StaffID= '$staffid'");
                $dev->delete('devloper', "StaffID= '$staffid'");

                echo '<script> alert("Data Deleted"); </script>';
                header("location: quanly.php");

                break;
            case 'deletemanager':
                $staffid = $_POST["deletemanager_id"];

                $staff = new database();
                $manager = new database();

                $staff->delete('staff', "StaffID= '$staffid'");
                $manager->delete('manager', "StaffID= '$staffid'");

                echo '<script> alert("Data Deleted"); </script>';
                header("location: quanly.php");

                break;
            case 'deletework':
                $staffid = $_POST["deletework_id"];

                $work = new database();

                $work->delete('work', "StaffID= '$staffid'");

                echo '<script> alert("Data Deleted"); </script>';
                header("location: quanly.php");

                break;
            case 'deletesalary':
                $staffid = $_POST["deletesalary_id"];

                $salary = new database();

                $salary->delete('soefficientsalary', "StaffID= '$staffid'");

                echo '<script> alert("Data Deleted"); </script>';
                header("location: quanly.php");

                break;
        }
    }
}

new delete();
