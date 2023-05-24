<?php
// model controller
require_once "../model/controller.php";

class add_employee extends controller
{
    public function __construct()
    {
        parent::__construct();
        // Lấy thông tin nhân viên từ yêu cầu POST
        $name = $_POST["name"];
        $age = $_POST["age"];
        $job = $_POST["job"];


        // Thực hiện truy vấn để thêm nhân viên vào bảng "nhan_vien"
        $sql = "INSERT INTO nhan_vien (name, age, job) VALUES ('$name', '$age', '$job')";
        $this->model->execute($sql);
    }
}

new add_employee();
