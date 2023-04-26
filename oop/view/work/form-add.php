<form role="form" action="add.php?action=addwork" method="post">
    <div class="modal-body">
        <div class="d-flex flex-column gap-3">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="staffid" placeholder="Staff ID" aria-label="Username" aria-describedby="basic-addon1" />
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="So gio" name="sogio" aria-label="Username" aria-describedby="basic-addon1" />
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="thang" name="thang" aria-label="Username" aria-describedby="basic-addon1" />
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="nam" name="nam" aria-label="Username" aria-describedby="basic-addon1" />
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Hủy
        </button>
        <button type="submit" class="btn btn-primary" name="addwork">
            Thêm
        </button>
    </div>
</form>