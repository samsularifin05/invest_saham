import { deteletData, getData, getDataTabel, postData, putData, serializeObject, ToastNotification } from "../helper";

window.showModalMember = function () {
    $("#form_tambah_member")[0].reset();
    $("#username").removeAttr("readonly");
    $("#is_edit").val(false);
    $("#passwordhidden").show();
    document.getElementById("title_modal_member").innerHTML = "Tambah Data User";
    $("#ModalDataMember").modal("show");
};


window.getDataMember = function () {
    let columns = [
        {
            data: "DT_RowIndex",
            name: "DT_Row_Index",
            className: "text-center",
        },
        {
            data: "username",
        },
        {
            data: "Nama Lengkap",
        },
        {
            data: "No Hp",
        },
        {
            data: "No Rekening",
        },
        {
            data: "ALamat",
        },
        {
            data: "action",
            orderable: false,
            className: "text-center",
            searchable: false,
        },
    ];
    getDataTabel("tbl_data_member", "/get-data-member", columns);
};

window.hapusDataMember = function (e){
    Swal.fire({
        icon: "info",
        title: "Apakah Anda Ingin Mneghapus Data Ini ?",
        showCancelButton: true,
        confirmButtonText: "Hapus",
    }).then((result) => {
        if (result.isConfirmed) {
            deteletData("/data-user/" + e)
                .then((res) => {
                    ToastNotification("success", "Data Berhasil Dihapus");
                    getDataMember();
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

window.simpanDataMember = function (e) {
    e.preventDefault();
    let form_data = $("#form_tambah_member").serializeArray();
    let databaru = serializeObject(form_data);
    if (databaru?.is_edit === "true") {

        putData("/data-user/" + databaru?.kode_jenis, form_data)
            .then((res) => {
                ToastNotification("success", "Data Berhasil Disimpan");
                $("#ModalDataMember").modal("hide");
                $("#form_tambah_member")[0].reset();
                getDataMember();
            })
            .catch((err) => {
                ToastNotification(
                    "info",
                    err?.response?.data?.pesan || err?.response?.data?.message
                );
            });
    } else {
        if(databaru?.password == undefined){
            ToastNotification("info", "Password Tidak Boleh Kosong");
            return false
        }
        postData("/data-user", form_data)
            .then((res) => {
                ToastNotification("success", "Data Berhasil Disimpan");
                $("#ModalDataMember").modal("hide");
                $("#form_tambah_member")[0].reset();
                getDataMember();
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
    getData("/data-user/" + e)
    .then((res) => {
        if (res.data.status == "berhasil") {
            res.data.data.forEach((el) => {
                $("#username").attr('readonly', 'readonly');
                $("#is_edit").val(true);
                $("#passwordhidden").hide();
                $("#username").val(el.username);
                $("#nama_lengkap").val(el.nama_lengkap);
            });
            document.getElementById("title_modal_member").innerHTML = "Edit Data User";
            $("#ModalDataMember").modal("show");
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
