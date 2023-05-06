<div class="p-3 border border-secondary m-auto col-6">
    <div class="panel-body">
        <form method="post" action="<?php echo $form_action ?>">
            <h5 class="text-center">Thống kê theo tháng</h5>
            <br>
            <div class="row">
                <div class="col-md-3">Tháng</div>
                <div class="col-md-9"><input class="form-control" min="1" max="12" type="number" name="month"></div>
            </div>
            <div class="row">
                <div class="col-md-3">Năm</div>
                <div class="col-md-9"><input class="form-control" type="number" name="year"></div>
            </div>
            <div class="row">
                <div class="col-md-3">Sắp xếp theo</div>
                <div class="col-md-4">
                    <select name="sort" class="form-select">
                        <option value="1">Tên</option>
                        <option value="2">Giờ làm</option>
                        <option value="3">Lương 1 tháng</option>
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-md-3"></div>
                <div class="col-md-9"><input type="submit" class="btn btn-primary" value="thống kê"></div>
            </div>
        </form>
    </div>
</div>