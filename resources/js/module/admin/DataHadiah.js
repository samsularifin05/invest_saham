import { deteletData, getData, getDataTabel, postData, putData, serializeObject, ToastNotification } from "../helper";

window.showModalHadiah = function () {
    $("#form_tambah_hadiah")[0].reset();
    $("#is_edit").val(false);
    document.getElementById("title_modal_hadiah").innerHTML = "Tambah Data Hadiah";
    $("#ModalHadiah").modal("show");
};


window.getDataHadiah = function () {
    let columns = [
        {
            data: "DT_RowIndex",
            name: "DT_Row_Index",
            className: "text-center",
        },
        {
            data: "kode_hadiah",
        },
        {
            data: "kouta",
        },
        {
            data: "total_nominal_hadiah",
        },
        {
            data: "nominal_hadiah_permember",
        },
        {
            data: "kuota_terpenuhi",
        },
        {
            data: "action",
            orderable: false,
            className: "text-center",
            searchable: false,
        },
    ];
    getDataTabel("tbl_data_Hadiah", "/get-data-hadiah", columns);
};

window.hapusDataHadiah = function (e){
    Swal.fire({
        icon: "info",
        title: "Apakah Anda Ingin Mneghapus Data Ini ?",
        showCancelButton: true,
        confirmButtonText: "Hapus",
    }).then((result) => {
        if (result.isConfirmed) {
            deteletData("/data-hadiah/" + e)
                .then((res) => {
                    ToastNotification("success", "Data Berhasil Dihapus");
                    getDataHadiah();
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

window.simpanDataHadiah = function (e) {
    e.preventDefault();
    let form_data = $("#form_tambah_hadiah").serializeArray();
    let databaru = serializeObject(form_data);
    if (databaru?.is_edit === "true") {

        putData("/data-hadiah/" + databaru?.kode_jenis, form_data)
            .then((res) => {
                ToastNotification("success", "Data Berhasil Disimpan");
                $("#ModalHadiah").modal("hide");
                $("#form_tambah_hadiah")[0].reset();
                getDataHadiah();
            })
            .catch((err) => {
                ToastNotification(
                    "info",
                    err?.response?.data?.pesan || err?.response?.data?.message
                );
            });
    } else {
        postData("/data-hadiah", form_data)
            .then((res) => {
                ToastNotification("success", "Data Berhasil Disimpan");
                $("#ModalHadiah").modal("hide");
                $("#form_tambah_hadiah")[0].reset();
                getDataHadiah();
            })
            .catch((err) => {
                ToastNotification(
                    "info",
                    err?.response?.data?.pesan || err?.response?.data?.message
                );
            });
    }
};

window.showDetailHadiah= function (e) {
    getData("/data-hadiah/" + e)
    .then((res) => {
        if (res.data.status == "berhasil") {
            res.data.data.forEach((el) => {
                $("#kode_hadiah").attr('readonly', 'readonly');
                $("#is_edit").val(true);
                $("#kode_hadiah").val(el.kode_hadiah);
                $("#kouta_hadiah").val(el.kouta);
                $("#nominal_hadiah").val(el.total_nominal_hadiah);
            });
            document.getElementById("title_modal_hadiah").innerHTML = "Edit Data Hadiah";
            $("#ModalHadiah").modal("show");
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
