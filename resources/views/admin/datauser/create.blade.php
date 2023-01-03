<div class="modal fade" tabindex="-1" role="dialog" id="ModalDataUsers">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title_modal_users">Tambah Data Users</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="form_tambah_users" onsubmit="simpanDataUsers(event)">
                    {{-- @csrf --}}
                    <div class="row">
                        <div class="col-12">
                            <input class="form-control" id="is_edit" autocomplete="off" type="hidden" name="is_edit">
                            <input class="form-control" id="level" autocomplete="off" type="hidden" value="admin" name="level">
                        </div>
                        <div class="col-12">
                            <label> Username  </label>
                            <input class="form-control" id="username" autocomplete="off" type="text" name="username"
                                placeholder="Username" required>
                            <br>
                        </div>
                        <div class="col-12" id="passwordhidden">
                            <label> Password </label>
                            <input class="form-control" id="password" autocomplete="off" type="password"
                                name="password" placeholder="Password">
                            <br>
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
