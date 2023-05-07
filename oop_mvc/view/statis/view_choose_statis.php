<div class="p-3 border border-secondary m-auto col-6">
    <div class="panel-body">
        <form method="post" action="<?php echo $form_action ?>" class="d-flex flex-column gap-4 justify-content-center">

            <h5 class="text-center">Thống kê theo tháng</h5>

            <div class="row d-flex align-items-center">
                <div class="col-md-3">Tháng</div>
                <div class="col-md-9"><input class="form-control" min="1" max="12" type="number" name="month" value="" placeholder="VD: 7"></div>
            </div>

            <div class="row d-flex align-items-center">
                <div class="col-md-3">Năm</div>
                <div class="col-md-9"><input class="form-control" type="number" name="year" value="" placeholder="VD: 2022"></div>
            </div>

            <div class="row d-flex align-items-center">
                <div class="col-md-3">Sắp xếp theo</div>
                <div class="col-md-4">
                    <select name="sort" class="form-select">
                        <option value="1">Tên</option>
                        <option value="2">Giờ làm</option>
                        <option value="3">Lương theo tháng</option>
                    </select>
                </div>
            </div>

            <div class="row d-flex align-items-center">
                <div class="col-3">Lọc theo</div>
                <div class="col-9">
                    <div class="range d-flex align-items-center gap-3">
                        <select name="filter" class="form-select">
                            <option value="1">Giờ làm</option>
                            <option value="2">Lương cơ bản</option>
                        </select>
                        <input type="number" class="form-control w-50" min="0" name="min" value="" require placeholder="Number">
                        <div>To</div>
                        <input type="number" class="form-control w-50" min="0" name="max" value="" require placeholder="Number">
                    </div>
                </div>
            </div>

            <input type="submit" class="btn btn-primary w-25 m-auto" value="Thống kê">

        </form>
    </div>
</div>