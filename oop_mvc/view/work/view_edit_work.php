<div class="p-3 border border-secondary">
    <h4 class="text-center">Sửa giờ làm</h4>
    <br>
    <div class="panel-body">
        <form method="post" action="<?php echo $form_action; ?>">
            <div class="row">
                <div class="col-md-3">Tháng</div>
                <div class="col-md-9"><input type="number" name="month" value="<?php echo isset($work) ? $work->getMonthDo() : ""; ?>" class="form-control" min=1 max=12 require></div>
            </div>
            <div class="row">
                <div class="col-md-3">Năm</div>
                <div class="col-md-9"><input type="number" name="year" value="<?php echo isset($work) ? $work->getYearDo() : ""; ?>" class="form-control"></div>
            </div>
            <div class="row">
                <div class="col-md-3">Số giờ làm việc</div>
                <div class="col-md-9"><input type="number" name="hour" value="<?php echo isset($work) ? $work->getHourDo() : ""; ?>" class="form-control"></div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-9"><input type="submit" value="<?php echo $act; ?>" class="btn btn-primary" name=""></div>
            </div>
        </form>
    </div>
</div>