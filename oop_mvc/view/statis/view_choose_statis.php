<div class="p-3 border border-secondary m-auto col-6">
    <div class="panel-body">
        <form method="post" action="<?php echo $form_action ?>" class="d-flex flex-column gap-4 justify-content-center">

            <h5 class="text-center">Thống kê theo tháng</h5>

            <div class="row">
                <div class="col-md-3">Tháng</div>
                <div class="col-md-9"><input class="form-control" min="1" max="12" type="number" name="month" value=""></div>
            </div>

            <div class="row">
                <div class="col-md-3">Năm</div>
                <div class="col-md-9"><input class="form-control" type="number" name="year" value=""></div>
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
                <div class="col-3">Lọc theo giờ</div>
                <div class="col-6">
                    <div class="range d-flex align-items-center gap-3">
                        <input type="number" class="form-control w-25" min="0" name="minhour" value="" require>
                        <div>To</div>
                        <input type="number" class="form-control w-25" min="0" name="maxhour" value="" require>
                    </div>
                </div>
            </div>

            <input type="submit" class="btn btn-primary w-25 m-auto" value="Thống kê">

        </form>
    </div>
</div>