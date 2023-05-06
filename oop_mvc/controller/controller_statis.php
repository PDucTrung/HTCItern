<?php
class controller_statis extends controller
{
    public function __construct()
    {
        parent::__construct();

        if ($_SERVER["REQUEST_METHOD"] == "POST") {

            $sort = $_POST["sort"];
            $month = $_POST["month"] == "" ? 0 : $_POST["month"];
            $year = $_POST["year"] == "" ? 0 : $_POST["year"];
        } else {
            $sort = $_GET["sort"];
            $month = $_GET["month"] == "" ? 0 : $_GET["month"];
            $year = $_GET["year"] == "" ? 0 : $_GET["year"];
        }

        // pagination
        $record_per_page = 3;
        $page = isset($_GET["page"]) ? $_GET["page"] : "1";
        $from = ($page - 1) * $record_per_page;


        switch ($sort) {
            case "2":
                $total_record = $this->model->count("select * from tbl_worker inner join tbl_work on tbl_worker.pk_id_worker = tbl_work.fk_id_worker WHERE tbl_work.month = $month && tbl_work.year = $year");
                $list_worker = $this->model->fetch("select * from tbl_worker inner join tbl_work on tbl_worker.pk_id_worker = tbl_work.fk_id_worker WHERE tbl_work.month = $month && tbl_work.year = $year ORDER BY tbl_work.number_hour DESC limit $from,$record_per_page");
                break;
            case "3":
                $total_record = $this->model->count("select * from tbl_worker");
                $list_worker = $this->model->fetch("select * from tbl_worker ORDER BY tbl_worker.bassic_pay DESC limit $from,$record_per_page");
                break;
            default:
                $total_record = $this->model->count("select * from tbl_worker");
                $list_worker = $this->model->fetch("select * from tbl_worker ORDER BY tbl_worker.name_worker DESC limit $from,$record_per_page");
        }


        $number_page = ceil($total_record / $record_per_page);

        // show data
        $arr_worker = array();

        foreach ($list_worker as $workers) {
            // developer
            if ($workers->fk_id_type_worker == 1) {
                $worker = new Developer();

                $worker->setId($workers->pk_id_worker);

                $worker->setName($workers->name_worker);

                $type_worker = $this->model->fetch_one("select * from tbl_type_worker where pk_id_type_worker = $workers->fk_id_type_worker");
                $worker->setTypeWorker($type_worker->name_type_worker);

                $level = $this->model->fetch_one("select * from tbl_level where pk_id_level=$workers->fk_id_level");
                $worker->setLevel($level->name_level);

                $noun = $this->model->fetch_one("select * from tbl_noun where fk_id_level=$level->pk_id_level");
                $worker->setNoun($noun->noun);

                $worker->setBasicPay($workers->bassic_pay);

                $hour_do = $this->model->fetch_one("SELECT tbl_work.number_hour from tbl_work WHERE tbl_work.month = $month && tbl_work.year = $year && tbl_work.fk_id_worker = $workers->pk_id_worker");
                $worker->setHourDo($hour_do == null ? 0 : $hour_do->number_hour);

                array_push($arr_worker, $worker);
            }

            // manager
            if ($workers->fk_id_type_worker == 2) {
                $worker = new ManagerProduct();

                $worker->setId($workers->pk_id_worker);

                $worker->setName($workers->name_worker);

                $type_worker = $this->model->fetch_one("select * from tbl_type_worker where pk_id_type_worker = $workers->fk_id_type_worker");
                $worker->setTypeWorker($type_worker->name_type_worker);

                $level = $this->model->fetch_one("select * from tbl_level where pk_id_level=$workers->fk_id_level");
                $worker->setLevel($level->name_level);

                $noun = $this->model->fetch_one("select * from tbl_noun where fk_id_level=$level->pk_id_level");
                $worker->setNoun($noun->noun);

                $worker->setBasicPay($workers->bassic_pay);

                $hour_do = $this->model->fetch_one("SELECT tbl_work.number_hour from tbl_work WHERE tbl_work.month = $month && tbl_work.year = $year && tbl_work.fk_id_worker = $workers->pk_id_worker");
                $worker->setHourDo($hour_do == null ? 0 : $hour_do->number_hour);

                array_push($arr_worker, $worker);
            }
        }

        include_once "view/statis/view_statis.php";
    }
}
new controller_statis();
