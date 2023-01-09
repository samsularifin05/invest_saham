<div class="modal fade" tabindex="-1" role="dialog" id="ModalHadiah">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title_modal_hadiah">Tambah Data Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="form_tambah_hadiah" onsubmit="simpanDataHadiah(event)">
                    {{-- @csrf --}}
                    <div class="row">
                        <div class="col-12">
                            <input class="form-control" id="is_edit" autocomplete="off" type="hidden" name="is_edit">
                            <input class="form-control" id="id_produk" autocomplete="off" type="hidden" value=""
                                name="id_produk">
                        </div>
                        <div class="col-12">
                            <label> Kode Hadiah </label>
                            <input class="form-control" id="kode_hadiah" autocomplete="off" type="text"
                                name="kode_hadiah" placeholder="Kode Hadiah" required>
                            <br>
                        </div>
                        <div class="col-12">
                            <label> Kouta Hadiah </label>
                            <input class="form-control" id="kouta_hadiah" autocomplete="off" type="text"
                                name="kouta_hadiah" placeholder="Kouta Hadiah" required>
                            <br>
                        </div>
                        <div class="col-12">
                            <label> Nominal Hadiah </label>
                            <input class="form-control" id="nominal_hadiah" autocomplete="off" type="text"
                                name="nominal_hadiah" placeholder="Nominal Hadiah" required>
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
