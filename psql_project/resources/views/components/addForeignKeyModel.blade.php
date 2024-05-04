<div class="modal fade" id="addForeignKeyModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Foreign Key:</h5>
                <button type="button" class="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class=" row">
                        <label for="message-text" class="col-4 col-form-label">Local Column:</label>
                        <select class="col-6 local-table-cols" style="margin-left: 5px; margin-right: 5px; margin-top: 5px; border-radius: 5px" required>
                        </select>
                    </div>
                    <div class=" row">
                        <label for="message-text" class="col-4 col-form-label">Reference Table:</label>
                        <select class="col-6 reference-table" style="margin-left: 5px; margin-right: 5px; margin-top: 5px; border-radius: 5px" required>
                        </select>
                    </div>
                    <div class=" row">
                        <label for="message-text" class="col-4 col-form-label">Referencing Column:</label>
                        <select class="col-6 referenced-tables-cols" style="margin-left: 5px; margin-right: 5px; margin-right: 5px; margin-top: 5px; border-radius: 5px" required>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary closeModal" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success addForeignKeyBtn">Add Foreign Key</button>
            </div>
        </div>
    </div>
</div>
