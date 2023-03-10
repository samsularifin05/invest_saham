<div class="modal fade" tabindex="-1" role="dialog" id="ModalProduk">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="title_modal_produk">Tambah Data Produk</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="POST" id="form_tambah_produk" enctype="multipart/form-data" onsubmit="simpanDataProduk(event)">
                    {{-- @csrf --}}
                    <div class="row">
                        <div class="col-12">
                            <input class="form-control" id="is_edit" autocomplete="off" type="hidden" name="is_edit">
                            <input class="form-control" id="id_produk" autocomplete="off" type="hidden" value="" name="id_produk">
                        </div>
                        <div class="col-12">
                            <label> Nama Produk  </label>
                            <input class="form-control" id="nama_produk" autocomplete="off" type="text" name="nama_produk"
                                placeholder="Nama Produk" required>
                            <br>
                        </div>
                        <div class="col-12">
                            <label> Harga Produk  </label>
                            <input class="form-control" id="harga_produk" autocomplete="off" type="number" name="harga_produk"
                                placeholder="Harga Produk" required>
                            <br>
                        </div>
                        <div class="col-12">
                            <label> Keunutngan Harian  </label>
                            <input class="form-control" id="keuntungan_harian" autocomplete="off" type="number" name="keuntungan_harian"
                                placeholder="Keuntungan Harian" required>
                            <br>
                        </div>
                        <div class="col-12">
                            <label> Total Keuntungan  </label>
                            <input class="form-control" id="total_keuntungan" autocomplete="off" type="number" name="total_keuntungan"
                                placeholder="Total Keuntungan" required>
                            <br>
                        </div>
                        <div class="col-12">
                            <label> Masa Kontrak  </label>
                            <input class="form-control" id="masa_kontrak" autocomplete="off" type="number" name="masa_kontrak"
                                placeholder="Masa Kontrak" required>
                            <br>
                        </div>
                        <div class="col-12">
                            <label> Image  </label>
                            <input class="form-control" id="image" autocomplete="off" type="file" name="image"
                                placeholder="Pilih Image" required>
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
