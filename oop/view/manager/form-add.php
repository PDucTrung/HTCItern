<form role="form" action="add.php?action=addmanager" method="post">
    <div class="modal-body">
        <div class="d-flex flex-column gap-3">
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="StaffID" name="staffid" aria-label="StaffID" aria-describedby="basic-addon1" />
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Ten" name="ten" aria-label="ten" aria-describedby="basic-addon1" />
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Tuoi" name="tuoi" aria-label="tuoi" aria-describedby="basic-addon1" />
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Dia chi" name="diachi" aria-label="diachi" aria-describedby="basic-addon1" />
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Ngay sinh" name="ngaysinh" aria-label="ngaysinh" aria-describedby="basic-addon1" />
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="So nam kinh nghiem" name="sonamkinhnghiem" aria-label="sonamkn" aria-describedby="basic-addon1" />
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="luong co ban" name="luongcoban" aria-label="sonamkn" aria-describedby="basic-addon1" />
            </div>
            <div class="input-group mb-3">
                <select class="form-select" name="selectlevel" aria-label="Default select example">
                    <option selected value="">select level</option>
                    <option value="PA">PA</option>
                    <option value="PM">PM</option>
                </select>
            </div>
        </div>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            Hủy
        </button>
        <button type="submit" class="btn btn-primary" name="addmanager">
            Thêm
        </button>
    </div>
</form>