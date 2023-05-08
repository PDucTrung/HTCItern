<?php

class controller_detail_worker extends controller
{
    public function __construct()
    {
        parent::__construct();
        $id_worker = $_GET["id_worker"];
        $workers = $this->model->fetch_one("select * from tbl_worker where pk_id_worker= $id_worker");

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
        include_once "view/staff/view_detail_worker.php";
    }
}
new controller_detail_worker();
