<form role="form" action="edit.php?action=editsalary" method="post">
    <div class="modal-body">
        <div class="d-flex flex-column gap-3">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="staffid" placeholder="Staff ID" aria-label="Username" aria-describedby="basic-addon1" id="editsalary_id" readonly />
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="hesoluong" placeholder="He so luong" aria-label="Username" aria-describedby="basic-addon1" />
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Hủy
        </button>
        <button type="submit" class="btn btn-primary">lưu</button>
    </div>
</form>