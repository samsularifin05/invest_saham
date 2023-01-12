import { forEach } from "lodash";
import { base_url } from "../../../js/module/base_url";
import {
    $,
    deteletData,
    getData,
    postData,
    serializeObject,
    ToastNotification,
} from "../../../js/module/helper";

window.getDataBank = async function () {
    // console.log("masuk");
    try {
        let cekPasswordPenarikan = await getData("/ceking-password-penarikan");
        // console.log(cekPasswordPenarikan.data.password_pernarikan)
        // for
        if(cekPasswordPenarikan.data.password_pernarikan === "-"){
            window.location.href = base_url +'/ganti-password-penarikan'
        }
        let result = await getData("/data-bank/1");
        // console.log(result.data)
        if (result.data.data.length === 0) {
            $("#content-data-bank").html(`
            <div class="col-lg-12 mb-3 d-flex flex-column">
            <div class="card dark-bg">
                <div class="card-body text-center">
                    Data Bank Tidak Ada
                </div>
            </div>
        </div>`);
        } else {
            // console.log(result.data.data)
            $("#content-data-bank").html("");
            result.data.data.forEach((el) => {
                $("#content-data-bank").append(`
                <div class="col-lg-4 mb-3 d-flex flex-column">
                <div class="card dark-bg">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-auto align-self-center">
                                <img src="${base_url}'/images/masterocard.png'" alt="">
                            </div>
                            <div class="col align-self-center text-end">
                                <p class="small">
                                    <span class="text-muted" onclick="deleteData(${el.id})">
                                        <i class="bi bi-trash"></i>
                                    </span>
                                </p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <h4 class="fw-normal mb-2">
                                    &nbsp;
                                    <span class="small text-muted"></span>
                                </h4>
                                <p class="mb-0 text-muted size-12">${el.no_rekening}</p>
                                <p class="text-muted size-12">${el.atas_nama}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
                `);
            });
        }
    } catch (error) {
        console.log(error);
    }
};

window.simpanDataBank = async function (e) {
    e.preventDefault();

    let form_data = $("#form_tambah_data_bank").serializeArray();
    let databaru = serializeObject(form_data);
    console.log(databaru);
    try {
        await postData("/data-bank", form_data);
        ToastNotification("success", "Data Berhasil Disimpan");
        getDataBank();
        $("#modalBank").modal("hide");
        $("#form_tambah_data_bank")[0].reset();
    } catch (error) {
        ToastNotification(
            "info",
            error?.response?.data?.pesan || "Data Gagal Disimpan"
        );
    }
};
window.deleteData = async function (e) {
    // e.preventDefault();
    console.log(e);

    Swal.fire({
        icon: "info",
        title: "Apakah Anda Ingin Mneghapus Data Ini ?",
        showCancelButton: true,
        confirmButtonText: "Hapus",
    }).then((result) => {
        if (result.isConfirmed) {
            deteletData("/data-bank/" + e)
                .then((res) => {
                    ToastNotification("success", "Data Berhasil Dihapus");
                    getDataBank();
                })
                .catch((err) => {
                    ToastNotification("info", err?.response?.data?.pesan);
                });
        }
    });
};
