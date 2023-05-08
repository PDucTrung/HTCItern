<?php

class controller_work extends controller
{

    public function __construct()
    {
        parent::__construct();
        // pagination
        $record_per_page = 4;
        $page = isset($_GET["page"]) ? $_GET["page"] : "1";
        $total_record = $this->model->count("select pk_id_work from tbl_work");
        $from = ($page - 1) * $record_per_page;
        $number_page = ceil($total_record / $record_per_page);

        // show data
        $list_work = $this->model->fetch("select * from tbl_work INNER JOIN tbl_worker on tbl_work.fk_id_worker = tbl_worker.pk_id_worker limit $from,$record_per_page");
        $arr_work = array();
        foreach ($list_work as $works) {
            $work = new Person();
            $work->setId($works->pk_id_work);
            $work->setName($works->name_worker);
            $work->setHourDo($works->number_hour);
            $work->setMonthDo($works->month);
            $work->setYearDo($works->year);
            array_push($arr_work, $work);
        }

        include_once "view/work/view_work.php";
    }
}
new controller_work();
