<div class="p-3 border border-secondary m-auto col-6">
    <div class="panel-body">
        <form method="post" action="<?php echo $form_action ?>" class="d-flex flex-column gap-4 justify-content-center">

            <h5 class="text-center">Thống kê thời gian làm theo nhân viên</h5>

            <div class="row d-flex align-items-center">
                <div class="col-md-5">Chọn nhân viên muốn xem</div>
                <div class="col-md-7">
                    <select name="name_worker" class="form-select">
                        <?php $arr_name = $this->model->fetch("select * from tbl_worker");
                        foreach ($arr_name as $name) {
                        ?>
                            <option value="<?php echo $name->name_worker; ?>"><?php echo $name->name_worker; ?></option>
                        <?php } ?>
                    </select>
                </div>
            </div>

            <input type="submit" class="btn btn-primary w-25 m-auto" value="View">

        </form>
    </div>
</div>