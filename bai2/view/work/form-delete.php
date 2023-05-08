<form role="form" action="delete.php?action=deletework" method="post">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteWorkModalLabel">Delete work</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <input type="hidden" name="deletework_id" id="deletework_id" value="">
        <h4> Do you want to Delete this Data ?</h4>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" name="deletedata" class="btn btn-primary">OK</button>
    </div>
</form>