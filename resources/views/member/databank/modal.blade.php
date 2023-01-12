<div class="modal fade" id="modalBank" tabindex="-1" aria-labelledby="modalBankLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <form method="POST" id="form_tambah_data_bank" onsubmit="simpanDataBank(event)">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalBankLabel">Tambah Bank</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="mb-3">
                        <label class="form-label"> Pilih Bank </label>
                        {{ Form::select('nama_bank', $listbank, '1', ['class' => 'form-control']) }}
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> No Rekening </label>
                        {!! Form::number('no_rekening', null, [
                            'placeholder' => 'Masukan No Rekening',
                            'min'=>"1",
                            'class' => 'form-control',
                            'required',
                        ]) !!}
                    </div>
                    <div class="mb-3">
                        <label class="form-label"> Atas Nama </label>
                        {!! Form::text('atas_nama', null, [
                            'placeholder' => 'Masukan Atas Nama',
                            'class' => 'form-control',
                            'required',
                        ]) !!}
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
        </form>
    </div>
</div>
