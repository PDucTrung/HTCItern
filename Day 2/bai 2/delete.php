<?php
include "connect.php";

switch ($_GET["action"]) {
    case 'deletework':
        $staffid = $_POST["deletework_id"];

        $query = "DELETE FROM work WHERE StaffID='$staffid'";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            echo '<script> alert("Data Deleted"); </script>';
            header("location: quanly.php");
        } else {
            echo '<script> alert("Data Not Deleted"); </script>';
        }

        break;
    case 'deletesalary':
        $staffid = $_POST["deletesalary_id"];

        $query = "DELETE FROM soefficientsalary WHERE StaffID='$staffid'";
        $query_run = mysqli_query($conn, $query);

        if ($query_run) {
            echo '<script> alert("Data Deleted"); </script>';
            header("location: quanly.php");
        } else {
            echo '<script> alert("Data Not Deleted"); </script>';
        }

        break;
    case 'deletedev':
        $staffid = $_POST["deletedev_id"];

        $staff = "DELETE FROM staff WHERE StaffID='$staffid'";
        $query = "DELETE FROM devloper WHERE StaffID='$staffid'";

        mysqli_query($conn, $staff);
        mysqli_query($conn, $query);

        echo '<script> alert("Data Deleted"); </script>';
        header("location: quanly.php");

        break;
    case 'deletemanager':
        $staffid = $_POST["deletemanager_id"];

        $staff = "DELETE FROM staff WHERE StaffID='$staffid'";
        $query = "DELETE FROM manager WHERE StaffID='$staffid'";

        mysqli_query($conn, $staff);
        mysqli_query($conn, $query);

        echo '<script> alert("Data Deleted"); </script>';
        header("location: quanly.php");

        break;
}