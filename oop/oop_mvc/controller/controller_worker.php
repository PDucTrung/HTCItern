<?php

class controller_worker extends controller
{
    public function __construct()
    {
        parent::__construct();

        // pagination
        $record_per_page = 3;
        $page = isset($_GET["page"]) ? $_GET["page"] : "1";
        $total_record = $this->model->count("select pk_id_worker from tbl_worker");
        $from = ($page - 1) * $record_per_page;
        $number_page = ceil($total_record / $record_per_page);

        // show data
        $list_worker = $this->model->fetch("select * from tbl_worker limit $from,$record_per_page");
        $arr_worker = array();
        foreach ($list_worker as $workers) {
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
                array_push($arr_worker, $worker);
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
                array_push($arr_worker, $worker);
            }
        }

        include_once "view/staff/view_worker.php";
    }
}
new controller_worker();
