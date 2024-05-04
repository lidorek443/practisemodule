<div class="modal fade" id="editTableColModel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="row" style="margin-left: 5px;">
                    <h5 class=" modal-title" id="">Edit Column: </h5>
                    <h6 class=" old-table-col-name" id="modal-title" style="padding-top: 6px; padding-left: 10px">
                    </h6>
                </div>
                <button type="button" class="close closeModal" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <h6 class="col-4">Column Name: </h6>
                    <input type="text" class="col-4 edit-col-name" placeholder="Table Col Name" required>
                    <div class=" col-3">
                        <button id="name" type="button" class="ConfirmUpdateTableCol btn btn-sm btn-secondary">
                            Update
                        </button>
                    </div>
                </div>
                <div class="row" style="margin-top: 5px">
                    <h6 class="col-4">Data Type: </h6>
                    <select class="col-4 edit-col-datatype" style="border-radius: 5px" required>
                        <option value="character varying">character varying</option>
                        <option value="text">text</option>
                        <option value="integer">integer</option>
                        <option value="double precision">double precision</option>
                        <option value="character">character</option>
                        <option value="bigint">bigint</option>
                        <option value="bit">bit</option>
                    </select>
                    <div class=" col-3">
                        <button id="data_type" type="button" class="ConfirmUpdateTableCol btn-sm btn btn-secondary">
                            Update
                        </button>
                    </div>
                </div>
                <div class="row" style="margin-top: 5px">
                    <h6 class="col-4">Is Nullable: </h6>
                    <select class="col-4 edit-col-isNullable" style="border-radius: 5px" required>
                        <option value="YES">YES</option>
                        <option value="NO">NO</option>
                    </select>
                    <div class=" col-3">
                        <button id="is_nullable" type="button" class="ConfirmUpdateTableCol btn-sm btn btn-secondary">
                            Update
                        </button>
                    </div>
                </div>
                <div class="row" style="margin-top: 5px">
                    <h6 class="col-4">Primary Key? </h6>
                    <input type="checkbox" class="col-4 edit-col-updated_isPk" id="edit-col-updated_isPk" style="height: 20px; width: 20px; margin-top: 7px">
                    <div class=" col-3">
                        <button id="is_pk" type="button" class="ConfirmUpdateTableCol btn-sm btn btn-secondary">
                            Update
                        </button>
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary closeModal" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
