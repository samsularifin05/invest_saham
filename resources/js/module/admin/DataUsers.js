import { deteletData, getData, getDataTabel, postData, putData, serializeObject, ToastNotification } from "../helper";

window.showModalUsers = function () {
    $("#form_tambah_users")[0].reset();
    $("#username").removeAttr("readonly");
    $("#is_edit").val(false);
    $("#passwordhidden").show();
    document.getElementById("title_modal_users").innerHTML = "Tambah Data User";
    $("#ModalDataUsers").modal("show");
};


window.getDataUsers = function () {
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
            data: "level",
        },
        {
            data: "action",
            orderable: false,
            className: "text-center",
            searchable: false,
        },
    ];
    getDataTabel("tbl_data_users", "/get-data-users", columns);
};

window.hapusDataUser = function (e){
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
                    getDataUsers();
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

window.simpanDataUsers = function (e) {
    e.preventDefault();
    let form_data = $("#form_tambah_users").serializeArray();
    let databaru = serializeObject(form_data);
    if (databaru?.is_edit === "true") {

        putData("/data-user/" + databaru?.kode_jenis, form_data)
            .then((res) => {
                ToastNotification("success", "Data Berhasil Disimpan");
                $("#ModalDataUsers").modal("hide");
                $("#form_tambah_users")[0].reset();
                getDataUsers();
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
                $("#ModalDataUsers").modal("hide");
                $("#form_tambah_users")[0].reset();
                getDataUsers();
            })
            .catch((err) => {
                ToastNotification(
                    "info",
                    err?.response?.data?.pesan || err?.response?.data?.message
                );
            });
    }
};

window.showDetailUsers= function (e) {
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
            document.getElementById("title_modal_users").innerHTML = "Edit Data User";
            $("#ModalDataUsers").modal("show");
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
