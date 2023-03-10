import { deteletData, getData, getDataTabel, postData, postDataWithImage, putData, serializeObject, ToastNotification } from "../helper";

window.showModalProduk = function () {
    $("#form_tambah_produk")[0].reset();
    $("#is_edit").val(false);
    document.getElementById("title_modal_produk").innerHTML = "Tambah Data Produk";
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
    var file = document.getElementById("image").files[0];
    // console.log(databaru)
    let data = new FormData();
    data.append('image', file, file.name);
    data.append('harga_produk',databaru.harga_produk);
    data.append('id_produk',databaru.id_produk);
    data.append('is_edit',databaru.is_edit);
    data.append('keuntungan_harian',databaru.keuntungan_harian);
    data.append('masa_kontrak',databaru.masa_kontrak);
    data.append('nama_produk',databaru.nama_produk);
    data.append('total_keuntungan',databaru.total_keuntungan);

    if (databaru?.is_edit === "true") {

        putData("/data-produk/" + databaru?.id_produk, form_data)
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
        postDataWithImage("/data-produk", data)
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

window.showDetailProduk= function (e) {
    getData("/data-produk/" + e)
    .then((res) => {
        if (res.data.status == "berhasil") {
            res.data.data.forEach((el) => {
                $("#is_edit").val(true);
                $("#nama_produk").val(el.nama_produk);
                $("#id_produk").val(el.id_produk);
                $("#harga_produk").val(el.harga_produk);
                $("#keuntungan_harian").val(el.keuntungan_harian);
                $("#total_keuntungan").val(el.total_keuntungan);
                $("#masa_kontrak").val(el.masa_kontrak);
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
