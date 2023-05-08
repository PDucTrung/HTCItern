<?php
class controller_choose_work extends controller
{
    public function __construct()
    {
        parent::__construct();
        $form_action = "index.php?controller=work";
        include_once "view/work/view_choose_work.php";
    }
}
new controller_choose_work();
