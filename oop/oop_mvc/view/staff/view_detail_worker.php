<div class="p-3 border border-secondary">
    <h4 class="text-center"><strong>Bảng thông tin chi tiết nhân viên</strong></h4>
    <br>

    <div class="panel-body">
        <form method="post" class="d-flex flex-column gap-2">
            <div class="row">
                <div class="col-md-3">Nhân viên</div>

                <div class="col-md-9"><input type="text" value="<?php echo isset($worker) ? $worker->getName() : ""; ?>" name="name_worker" class="form-control" disabled></div>
            </div>

            <div class="row">
                <div class="col-md-3">Ngày sinh</div>

                <div class="col-md-9"><input type="text" value="<?php echo isset($worker) ? date("d/m/Y", strtotime($worker->getBirthDay())) : ""; ?>" name="birthday" class="form-control" disabled></div>
            </div>

            <div class="row">
                <div class="col-md-3">Loại nhân viên</div>

                <div class="col-md-9"><input type="text" value="<?php echo isset($worker) ? $worker->getTypeWorker() : ""; ?>" name="type_worker" class="form-control" disabled></div>
            </div>

            <div class="row">
                <div class="col-md-3">Địa chỉ</div>

                <div class="col-md-9"><input type="text" value="<?php echo isset($worker) ? $worker->getAddress() : ""; ?>" name="address" class="form-control" disabled></div>
            </div>

            <div class="row">
                <div class="col-md-3">Kinh nghiệm</div>

                <div class="col-md-4"><input type="number" value="<?php echo isset($worker) ? $worker->getYearExp() : ""; ?>" name="number_year_exp" class="form-control" disabled></div>
            </div>

            <div class="row">
                <div class="col-md-3">Cấp độ</div>

                <div class="col-md-4">
                    <select class="form-select" name="level">
                        <?php $arr_all_level = $this->model->fetch("select * from tbl_level where fk_id_type_worker = $workers->fk_id_type_worker");

                        foreach ($arr_all_level as $level) {
                        ?>
                            <option <?php if ($level->name_level == $worker->getLevel()) echo "selected"; ?> value="<?php echo $level->pk_id_level; ?>"><?php echo $level->name_level; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <div class="row">
                <div class="col-md-3">Lương cơ bản</div>
                
                <div class="col-md-4"><input type="text" value="<?php echo isset($worker) ? $worker->getBasicPay() : ""; ?>" name="basic_pay" class="form-control" disabled></div>
            </div>

            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-9"><a class="btn btn-primary" href="index.php?controller=action_worker&act=edit&id_worker=<?php echo $worker->getId(); ?>">Chỉnh sửa</a></div>
            </div>
        </form>
    </div>
</div>