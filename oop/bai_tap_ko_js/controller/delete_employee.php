<?php
// model controller
require_once "../model/controller.php";

class delete_employee extends controller
{
    public function __construct()
    {
        parent::__construct();
        // Lấy thông tin nhân viên từ yêu cầu POST
        $name = $_POST["name"];


        // Thực hiện truy vấn để xóa nhân viên từ bảng "nhan_vien"
        $sql = "DELETE FROM nhan_vien WHERE name = '$name'";
        $this->model->execute($sql);
    }
}

new delete_employee();
