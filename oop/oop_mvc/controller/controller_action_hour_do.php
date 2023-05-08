<?php
class controller_action_hour_do extends controller
{
    public function __construct()
    {
        parent::__construct();
        $act = isset($_GET["act"]) ? $_GET["act"] : "";
        switch ($act) {
            case 'add': {
                    $id_worker = isset($_GET["id_worker"]) ? $_GET["id_worker"] : 0;
                    $worker = $this->model->fetch_one("select * from tbl_worker where pk_id_worker=$id_worker");
                    $form_action = "index.php?controller=action_hour_do&id_worker=$id_worker&act=do_add";
                    include_once "view/work/view_action_hour_do.php";
                    break;
                }
            case 'do_add': {
                    $id_worker = isset($_GET["id_worker"]) ? $_GET["id_worker"] : 0;
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $month = $_POST["month"];
                        $year = $_POST["year"];
                        $hour = $_POST["hour"];
                        if ($month == "" || $year == "" || $hour == "") {
                            echo '<script> alert("bạn vui lòng nhập đầy đủ thông tin"); </script>';
                            echo "<script> window.location = 'index.php?controller=action_hour_do&id_worker=$id_worker&act=add' </script>";
                        } else {
                            $check = $this->model->check("tbl_work", "*", "month=$month and year=$year");
                            if (mysqli_num_rows($check)  > 0) {
                                echo "<script> alert('Tháng $month năm $year đã được thêm giờ làm !'); </script>";
                                echo "<script> window.location = 'index.php?controller=action_hour_do&id_worker=$id_worker&act=add' </script>";
                            } else {
                                $this->model->execute("insert into tbl_work(fk_id_worker,number_hour,month,year) values($id_worker,$hour,$month,$year)");
                                header("location:index.php?controller=worker");
                            }
                        }
                    }
                    break;
                }
            case 'edit': {
                    $id_work = isset($_GET["id_work"]) ? $_GET["id_work"] : 0;
                    $name = isset($_GET["name_worker"]) ? $_GET["name_worker"] : 0;
                    $time = $this->model->fetch_one("select * from tbl_work where pk_id_work=$id_work");
                    $work = new Person();
                    $work->setHourDo($time->number_hour);
                    $work->setyearDo($time->year);
                    $work->setMonthDo($time->month);
                    $form_action = "index.php?controller=action_hour_do&id_work=$id_work&act=do_edit&name_worker=$name";
                    include_once "view/work/view_edit_work.php";
                    break;
                }
            case 'do_edit': {
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $id_work = isset($_GET["id_work"]) ? $_GET["id_work"] : 0;
                        $name = isset($_GET["name_worker"]) ? $_GET["name_worker"] : 0;
                        $hour = $_POST["hour"];
                        $year = $_POST["year"];
                        $month = $_POST["month"];
                        if ($month == "" || $year == "" || $hour == "") {
                            echo '<script> alert("bạn vui lòng nhập đầy đủ thông tin"); </script>';
                            echo "<script> window.location = 'index.php?controller=action_hour_do&act=edit&id_work=$id_work&name_worker=$name' </script>";
                        } {
                            $this->model->execute("update tbl_work set year=$year,number_hour=$hour,month=$month where pk_id_work = $id_work");
                            header("location:index.php?controller=work&name_worker=$name");
                        }
                    }
                    break;
                }
            case 'delete':
                $id_work = isset($_GET["id_work"]) ? $_GET["id_work"] : 0;
                $name = isset($_GET["name_worker"]) ? $_GET["name_worker"] : 0;
                $this->model->execute("delete from tbl_work where pk_id_work = $id_work");
                header("location:index.php?controller=work&name_worker=$name");
                break;
        }
    }
}
new controller_action_hour_do();
