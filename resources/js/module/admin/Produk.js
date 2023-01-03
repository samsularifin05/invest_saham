import { deteletData, getData, getDataTabel, postData, putData, serializeObject, ToastNotification } from "../helper";

window.showModalProduk = function () {
    $("#form_tambah_produk")[0].reset();
    $("#is_edit").val(false);
    document.getElementById("title_modal_produk").innerHTML = "Tambah Data User";
    $("#ModalProduk").modal("show");
};


window.getDataProduk = function () {
    let columns = [
        {
            data: "DT_RowIndex",
            name: "DT_Row_Index",
            className: "text-center",
        },
        {
            data: "nama_produk",
        },
        {
            data: "harga_produk",
        },
        {
            data: "keuntungan_harian",
        },
        {
            data: "total_keuntungan",
        },
        {
            data: "masa_kontrak",
        },
        {
            data: "action",
            orderable: false,
            className: "text-center",
            searchable: false,
        },
    ];
    getDataTabel("tbl_data_produk", "/get-data-produk", columns);
};

window.hapusDataProduk = function (e){
    Swal.fire({
        icon: "info",
        title: "Apakah Anda Ingin Mneghapus Data Ini ?",
        showCancelButton: true,
        confirmButtonText: "Hapus",
    }).then((result) => {
        if (result.isConfirmed) {
            deteletData("/data-produk/" + e)
                .then((res) => {
                    ToastNotification("success", "Data Berhasil Dihapus");
                    getDataProduk();
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

window.simpanDataProduk = function (e) {
    e.preventDefault();
    let form_data = $("#form_tambah_produk").serializeArray();
    let databaru = serializeObject(form_data);
    if (databaru?.is_edit === "true") {

        putData("/data-produk/" + databaru?.kode_jenis, form_data)
            .then((res) => {
                ToastNotification("success", "Data Berhasil Disimpan");
                $("#ModalProduk").modal("hide");
                $("#form_tambah_produk")[0].reset();
                getDataProduk();
            })
            .catch((err) => {
                ToastNotification(
                    "info",
                    err?.response?.data?.pesan || err?.response?.data?.message
                );
            });
    } else {
        postData("/data-produk", form_data)
            .then((res) => {
                ToastNotification("success", "Data Berhasil Disimpan");
                $("#ModalProduk").modal("hide");
                $("#form_tambah_produk")[0].reset();
                getDataProduk();
            })
            .catch((err) => {
                ToastNotification(
                    "info",
                    err?.response?.data?.pesan || err?.response?.data?.message
                );
            });
    }
};

window.showDetailMember= function (e) {
    getData("/data-produk/" + e)
    .then((res) => {
        if (res.data.status == "berhasil") {
            res.data.data.forEach((el) => {
                $("#username").attr('readonly', 'readonly');
                $("#is_edit").val(true);
                $("#passwordhidden").hide();
                $("#username").val(el.username);
                $("#nama_lengkap").val(el.nama_lengkap);
                $("#no_hp").val(el.no_hp);
                $("#alamat_lengkap").val(el.alamat_lengkap);
                $("#no_rekening").val(el.no_rekening);
            });
            document.getElementById("title_modal_produk").innerHTML = "Edit Data Member";
            $("#ModalProduk").modal("show");
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