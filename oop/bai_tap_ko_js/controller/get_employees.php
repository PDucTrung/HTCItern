<?php
// model controller
require_once "../model/controller.php";

class get_employees extends controller
{
  public function __construct()
  {
    parent::__construct();
    // Lấy danh sách nhân viên từ bảng "nhan_vien"
    $sql = "SELECT * FROM nhan_vien";
    $data = $this->model->fetch($sql);

    // Trả về danh sách nhân viên dưới dạng JSON
    echo json_encode($data);
  }
}

new get_employees();

