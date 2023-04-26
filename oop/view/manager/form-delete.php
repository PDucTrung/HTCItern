<form role="form" action="delete.php?action=deletemanager" method="post">
    <div class="modal-header">
        <h1 class="modal-title fs-5" id="deleteManagerModalLabel">Delete Manager
        </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
    </div>
    <div class="modal-body">
        <input type="hidden" name="deletemanager_id" id="deletemanager_id" value="">
        <h4> Do you want to Delete this Data ?</h4>
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="submit" name="deletedata" class="btn btn-primary">OK</button>
    </div>
</form>