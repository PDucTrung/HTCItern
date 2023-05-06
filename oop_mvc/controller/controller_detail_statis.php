<?php
class controller_detail_statis extends controller
{
    public function __construct()
    {
        parent::__construct();
        $id_worker = isset($_GET["id_worker"]) ? $_GET["id_worker"] : 0;
        $month = isset($_GET["month"]) ? $_GET["month"] : 0;
        $year = isset($_GET["year"]) ? $_GET["year"] : 1990;
        $arr_work = $this->model->fetch("select * from tbl_work where fk_id_worker=$id_worker");
        include_once "view/statis/view_detail_statis.php";
    }
}
new controller_detail_statis();
