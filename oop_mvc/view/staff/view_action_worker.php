<div class="p-3 border border-secondary">
    <h4 class="text-center"><strong>Xử lý dữ liệu nhân viên</strong></h4>
    <div class="panel-body">
        <form method="post" action="<?php echo $form_action ?>">
            <div class="row">
                <div class="col-md-3">Tên nhân viên</div>
                <div class="col-md-9"><input type="text" class="form-control" value="<?php echo isset($worker) ? $worker->getName() : ""; ?>" name="name_worker" placeholder="VD: Jhon"></div>
            </div>
            <div class="row">
                <div class="col-md-3">Ngày sinh</div>
                <div class="col-md-9"><input type="text" placeholder="YYYY-MM-DD" value="<?php echo isset($worker) ? $worker->getBirthDay() : ""; ?>" class="form-control" name="birthday" placeholder="2000-01-01"></div>
            </div>
            <div class="row">
                <div class="col-md-3">Kinh nghiệm</div>
                <div class="col-md-9"><input type="text" class="form-control" value="<?php echo isset($worker) ? $worker->getYearExp() : ""; ?>" name="number_year_exp" placeholder="VD: 2"></div>
            </div>
            <div class="row">
                <div class="col-md-3">Địa chỉ</div>
                <div class="col-md-9"><input type="text" class="form-control" value="<?php echo isset($worker) ? $worker->getAddress() : ""; ?>" name="address" placeholder="VD: Hà Nội"></div>
            </div>
            <div class="row">
                <div class="col-md-3">Tuổi</div>
                <div class="col-md-9"><input type="number" class="form-control" value="<?php echo isset($worker) ? $worker->getAge() : ""; ?>" name="age_worker" placeholder="VD: 23"></div>
            </div>
            <?php if ($act == "add") {
            ?>
                <div class="row">
                    <div class="col-md-3">Loại nhân viên</div>
                    <div class="col-md-4">
                        <select name="type_worker" class="form-select">
                            <?php $arr_type = $this->model->fetch("select * from tbl_type_worker");
                            foreach ($arr_type as $type) {
                            ?>
                                <option value="<?php echo $type->pk_id_type_worker; ?>"><?php echo $type->name_type_worker ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
            <?php
            } else {
            ?>
                <?php if ($act == "edit") { ?>
                    <div class="row">
                        <div class="col-md-3">Cấp bậc</div>
                        <div class="col-md-9"><input type="text" disabled class="form-control" value="<?php echo isset($worker) ? $worker->getLevel() : ""; ?>"></div>
                    </div>
                <?php } ?>
                <div class="row">
                    <div class="col-md-3">Loại nhân viên</div>
                    <div class="col-md-9"><input type="text" disabled class="form-control" value="<?php echo $worker->getTypeWorker(); ?>"></div>
                </div>
            <?php
            } ?>
            <div class="row">
                <div class="col-md-3">Lương cơ bản</div>
                <div class="col-md-9"><input type="text" class="form-control" value="<?php echo isset($worker) ? $worker->getBasicPay() : ""; ?>" name="bassic_pay" placeholder="VD: 30000"></div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-9"><input type="submit" class="btn btn-primary" value="<?php echo $act; ?>"></div>
            </div>

        </form>
    </div>
</div>