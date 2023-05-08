<form role="form" action="edit.php?action=editwork" method="post">
    <div class="modal-body">
        <div class="d-flex flex-column gap-3">
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="staffid" placeholder="Staff ID" aria-label="Username" id="editwork_id" aria-describedby="basic-addon1" value="" readonly />
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="sogio" placeholder="sogio" aria-label="Username" aria-describedby="basic-addon1" />
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="thang" placeholder="thang" aria-label="Username" aria-describedby="basic-addon1" />
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" name="nam" placeholder="nam" aria-label="Username" aria-describedby="basic-addon1" />
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Hủy
        </button>
        <button type="submit" class="btn btn-primary" name="edit">
            lưu
        </button>
    </div>
</form>