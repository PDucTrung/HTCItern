<form method="POST" role="form" action="add.php?action=addsalary">
    <div class="modal-header">
        <h5 class="modal-title" id="addDevSalaryLabel">
            Add Salary
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <div class="d-flex flex-column gap-3">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="StaffID" name="staffid" aria-label="level" aria-describedby="basic-addon1" value="" />
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="he so luong" aria-label="hsluong" name="hsluong" aria-describedby="basic-addon1" value="" />
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Hủy
        </button>
        <button type="submit" name="addhsluong" class="btn btn-primary">
            Thêm
        </button>
    </div>
</form>