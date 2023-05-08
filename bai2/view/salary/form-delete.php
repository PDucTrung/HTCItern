<form role="form" action="delete.php?action=deletesalary" method="post">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteSalaryModalLabel">Delete Salary
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <input type="hidden" name="deletesalary_id" id="deletesalary_id" value="">
        <h4> Do you want to Delete this Data ?</h4>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" name="deletedata" class="btn btn-primary">OK</button>
    </div>
</form>