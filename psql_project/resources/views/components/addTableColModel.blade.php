<div class="modal fade" id="addTableColModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Column:</h5>
                <button type="button" class="closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div class=" row">
                        <label for="message-text" class="col-4 col-form-label">Column Name:</label>
                        <input type="text" class="col-6 new-col-name" placeholder="Table Col Name" required>
                    </div>
                    <div class=" row" style="margin-top: 5px">
                        <label for="message-text" class="col-4 col-form-label">Data Type:</label>
                        <select type="text" class="col-6 new-col-datatype" required>
                            <option value="character varying">character varying</option>
                            <option value="text">text</option>
                            <option value="integer">integer</option>
                            <option value="double precision">double precision</option>
                            <option value="char">character</option>
                            <option value="bigint">bigint</option>
                            <option value="bit">bit</option>
                        </select>
                    </div>
                    <div class=" row" style="margin-top: 5px">
                        <label for="message-text" class="col-4 col-form-label">Is Nullable:</label>
                        <select type="text" class="col-6 new-col-isNullable" required>
                            <option value="NULL">YES</option>
                            <option value="NOT NULL">NO</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary closeModal" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-success ConfirmAddTableCol">Add New Column</button>
            </div>
        </div>
    </div>
</div>
