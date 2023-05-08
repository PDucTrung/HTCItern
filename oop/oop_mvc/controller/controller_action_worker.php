<?php

class controller_action_worker extends controller
{

    public function __construct()
    {
        parent::__construct();
        $act = isset($_GET["act"]) ? $_GET["act"] : "";
        switch ($act) {
            case 'add': {
                    $form_action = "index.php?controller=action_worker&act=do_add";
                    include_once "view/staff/view_action_worker.php";
                    break;
                }
            case 'do_add': {
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $name_worker = $_POST["name_worker"];
                        $birthday = $_POST["birthday"];
                        $number_year_exp = $_POST["number_year_exp"];
                        $address = $_POST["address"];
                        $age_worker = $_POST["age_worker"];
                        $type_worker = $_POST["type_worker"];
                        $bassic_pay = $_POST["bassic_pay"];
                        if ($type_worker == 1) {
                            if ($number_year_exp <= 2) {
                                $level = 1;
                            } else if ($number_year_exp < 5) {
                                $level = 2;
                            } else {
                                $level = 3;
                            }
                        } else {
                            if ($number_year_exp <= 5) {
                                $level = 4;
                            } else {
                                $level = 5;
                            }
                        }
                        if ($name_worker == "" || $birthday == "" || $number_year_exp == "" || $address == "" || $age_worker == "" || $type_worker == "" | $bassic_pay == "") {
                            echo '<script> alert("bạn vui lòng nhập đầy đủ thông tin"); </script>';
                            echo "<script> window.location = 'index.php?controller=action_worker&act=add' </script>";
                        } else {
                            $this->model->execute("insert into tbl_worker(fk_id_type_worker,fk_id_level,name_worker,age_worker,address,birth_day,number_year_exp,bassic_pay) values($type_worker,$level,'$name_worker',$age_worker,'$address','$birthday','$number_year_exp','$bassic_pay')");
                            header("location:index.php?controller=worker");
                        }
                    }
                    break;
                }
            case 'edit': {
                    $id_worker = isset($_GET["id_worker"]) ? $_GET["id_worker"] : 0;
                    $workers = $this->model->fetch_one("select * from tbl_worker where pk_id_worker = $id_worker");

                    // dev
                    if ($workers->fk_id_type_worker == 1) {
                        $worker = new Developer();
                        $type_worker = $this->model->fetch_one("select * from tbl_type_worker where pk_id_type_worker = $workers->fk_id_type_worker");
                        $worker->setTypeWorker($type_worker->name_type_worker);
                        $worker->setId($workers->pk_id_worker);
                        $worker->setName($workers->name_worker);
                        $worker->setAge($workers->age_worker);
                        $worker->setAddress($workers->address);
                        $worker->setBirthDay($workers->birth_day);
                        $worker->setYearExp($workers->number_year_exp);
                        $worker->setBasicPay($workers->bassic_pay);
                        $level = $this->model->fetch_one("select * from tbl_level where pk_id_level=$workers->fk_id_level");
                        $noun = $this->model->fetch_one("select * from tbl_noun where fk_id_level=$level->pk_id_level");
                        $worker->setNoun($noun->noun);
                        $worker->setLevel($level->name_level);
                        $list_lang = $this->model->fetch("select * from tbl_language_worker inner join tbl_language on tbl_language.pk_id_language = tbl_language_worker.fk_id_language inner join tbl_worker on tbl_worker.pk_id_worker = tbl_language_worker.fk_id_worker where tbl_worker.pk_id_worker = $workers->pk_id_worker");
                        $arr_lang = array();
                        foreach ($list_lang as $languages) {
                            $language = new LanguageCode();
                            $language->setName($languages->name);
                            array_push($arr_lang, $language);
                        }
                        $worker->setLanguageCode($arr_lang);
                    }

                    // manager
                    if ($workers->fk_id_type_worker == 2) {
                        $worker = new ManagerProduct();
                        $level = $this->model->fetch_one("select * from tbl_level where pk_id_level=$workers->fk_id_level");
                        $worker->setLevel($level->name_level);
                        $worker->setId($workers->pk_id_worker);
                        $noun = $this->model->fetch_one("select * from tbl_noun where fk_id_level=$level->pk_id_level");
                        $worker->setNoun($noun->noun);
                        $type_worker = $this->model->fetch_one("select * from tbl_type_worker where pk_id_type_worker = $workers->fk_id_type_worker");
                        $worker->setTypeWorker($type_worker->name_type_worker);
                        $worker->setName($workers->name_worker);
                        $worker->setAge($workers->age_worker);
                        $worker->setAddress($workers->address);
                        $worker->setBirthDay($workers->birth_day);
                        $worker->setYearExp($workers->number_year_exp);
                        $worker->setBasicPay($workers->bassic_pay);
                    }

                    $form_action = "index.php?controller=action_worker&act=do_edit&id_worker=$id_worker";
                    include_once "view/staff/view_action_worker.php";
                    break;
                }
            case 'do_edit': {
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        $id_worker = isset($_GET["id_worker"]) ? $_GET["id_worker"] : 0;
                        $workers = $this->model->fetch_one("select * from tbl_worker where pk_id_worker = $id_worker");
                        $name_worker = $_POST["name_worker"];
                        $birthday = $_POST["birthday"];
                        $age_worker = $_POST["age_worker"];
                        $address = $_POST["address"];
                        $number_year_exp = $_POST["number_year_exp"];
                        $bassic_pay = $_POST["bassic_pay"];

                        //                        
                        $id_type_worker = $_POST["type_worker"];
                        $type_worker = $workers->fk_id_type_worker;
                        echo $type_worker;

                        if ($id_type_worker == 1) {
                            if ($number_year_exp <= 2) {
                                $level = 1;
                            } else if ($number_year_exp < 4) {
                                $level = 2;
                            } else if ($number_year_exp < 5) {
                                $level = 3;
                            } else $level = 4;
                        } else {
                            if ($number_year_exp <= 5) {
                                $level = 5;
                            } else {
                                $level = 6;
                            }
                        }

                        if ($name_worker == "" || $birthday == "" || $number_year_exp == "" || $address == "" || $age_worker == "" || $type_worker == "" | $bassic_pay == "") {
                            echo '<script> alert("bạn vui lòng nhập đầy đủ thông tin"); </script>';
                            echo "<script> window.location = 'index.php?controller=action_worker&act=edit&id_worker=$id_worker' </script>";
                        } else {
                            $this->model->execute("update tbl_worker set address='$address',number_year_exp=$number_year_exp,bassic_pay=$bassic_pay,fk_id_level=$level,name_worker='$name_worker',birth_day='$birthday',age_worker=$age_worker, fk_id_type_worker=$id_type_worker where pk_id_worker = $id_worker");
                            header("location:index.php?controller=worker");
                        }
                    }
                    break;
                }
            case 'delete':
                $id_worker = isset($_GET["id_worker"]) ? $_GET["id_worker"] : 0;
                $this->model->execute("delete from tbl_worker where pk_id_worker = $id_worker");
                $this->model->execute("delete from tbl_work where fk_id_worker = $id_worker");
                header("location:index.php?controller=worker");
                break;
        }
    }
}
new controller_action_worker();
