<div class="p-3 border border-secondary">
    <h4><?php echo $worker->name_worker ?></h4>
    <div class="panel-body">
        <form method="post" action="<?php echo $form_action; ?>">
            <div class="row">
                <div class="col-md-3">Tháng</div>
                <div class="col-md-9"><input type="number" name="month" class="form-control" min=1 max=12 require placeholder="VD: 12"> </div>
            </div>
            <div class="row">
                <div class="col-md-3">Năm</div>
                <div class="col-md-9"><input type="number" name="year" class="form-control" placeholder="2023"></div>
            </div>
            <div class="row">
                <div class="col-md-3">Số giờ làm việc</div>
                <div class="col-md-9"><input type="number" name="hour" class="form-control" placeholder="120"></div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-9"><input type="submit" value="<?php echo $act; ?>" class="btn btn-primary" name=""></div>
            </div>
        </form>
    </div>
</div>