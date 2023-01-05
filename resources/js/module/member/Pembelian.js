import { deteletData, getData, getDataTabel, postData, putData, serializeObject, ToastNotification } from "../helper";

window.showModalPembelian = function () {
    $("#form_tambah_pembelian")[0].reset();
    /*
    $("#username").removeAttr("readonly");
    $("#is_edit").val(false);
    $("#passwordhidden").show();
    */
    document.getElementById("title_modal_pembelian").innerHTML = "Tambah Data Pembelian";
    $("#ModalDataPembelian").modal("show");
};


window.getDataPembelian = function () {
    let columns = [
        {
            data: "DT_RowIndex",
            name: "DT_Row_Index",
            className: "text-center",
        },
        {
            data: "id_detail_paket",
        },
        {
            data: "tanggal_mulai",
        },
        {
            data: "tanggal_selesai",
        },
        {
            data: "status_pembayaran",
        },
        {
            data: "action",
            orderable: false,
            className: "text-center",
            searchable: false,
        },
    ];
    getDataTabel("tbl_data_pembelian", "/get-pembelian", columns);
};

window.hapusDataPembelian = function (e){
    Swal.fire({
        icon: "info",
        title: "Apakah Anda Ingin Mneghapus Data Ini ?",
        showCancelButton: true,
        confirmButtonText: "Hapus",
    }).then((result) => {
        if (result.isConfirmed) {
            deteletData("/pembelian/" + e)
                .then((res) => {
                    ToastNotification("success", "Data Berhasil Dihapus");
                    getDataPembelian();
                })
                .catch((err) => {
                    ToastNotification(
                        "info",
                        err?.response?.data?.pesan ||
                            err?.response?.data?.message
                    );
                });
        }
    });
}

window.simpanDataPembelian = function (e) {
    e.preventDefault();
    let form_data = $("#form_tambah_pembelian").serializeArray();
    let databaru = serializeObject(form_data);
    if (databaru?.is_edit === "true") {

        putData("/pembelian/" + databaru?.kode_jenis, form_data)
            .then((res) => {
                ToastNotification("success", "Data Berhasil Disimpan");
                $("#ModalDataPembelian").modal("hide");
                $("#form_tambah_pembelian")[0].reset();
                getDataPembelian();
            })
            .catch((err) => {
                ToastNotification(
                    "info",
                    err?.response?.data?.pesan || err?.response?.data?.message
                );
            });
    } else {
        postData("/pembelian", form_data)
            .then((res) => {
                ToastNotification("success", "Data Berhasil Disimpan");
                $("#ModalDataPembelian").modal("hide");
                $("#form_tambah_pembelian")[0].reset();
                getDataPembelian();
            })
            .catch((err) => {
                ToastNotification(
                    "info",
                    err?.response?.data?.pesan || err?.response?.data?.message
                );
            });
    }
};

window.showDetailPembelian= function (e) {
    getData("/pembelian/" + e)
    .then((res) => {
        if (res.data.status == "berhasil") {
            res.data.data.forEach((el) => {
                $("#is_edit").val(true);
                $("#paket").val(el.id_detail_paket);
                $("#id").val(el.id);
            });
            document.getElementById("title_modal_pembelian").innerHTML = "Edit Data Pembelian";
            $("#ModalDataPembelian").modal("show");
        } else {
            ToastNotification("error", res.pesan);
            return false;
        }
    })
    .catch((err) => {
        ToastNotification(
            "info",
            err?.response?.data?.pesan || err?.response?.data?.message
        );
    });
}
