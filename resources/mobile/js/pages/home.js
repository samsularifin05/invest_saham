import { base_url } from "../../../js/module/base_url";
import {
    $,
    getData,
    postData,
    serializeObject,
    ToastNotification,
} from "../../../js/module/helper";

window.showModalQty = async function (e) {
    let data = JSON.parse(e);
    $("#modalAddQty").modal("show");
    $("#title_modal_qty").html(data.nama_produk);
    $("#harga_investasi").html(
        Number(data.harga_produk).toLocaleString("kr-ko")
    );
    $("#masa_kontrak").html(Number(data.masa_kontrak));
    $("#total_keuntungan").html(
        Number(data.total_keuntungan).toLocaleString("kr-ko")
    );
};

window.cekPin = async () => {
    try {
        let cekPasswordPenarikan = await getData("/ceking-password-penarikan");
        if (cekPasswordPenarikan.data.password_pernarikan === "-") {
            window.location.href = base_url + "/ganti-password-penarikan";
        }
    } catch (error) {
        console.log(error, "pin");
    }
};

window.simpanPasswordPenarikan = async function (e) {
    e.preventDefault();
    let form_data = $("#form_setting_password_penarikan").serializeArray();

    try {
        await postData("/simpan-password-penarikan", form_data, true);
        ToastNotification("success", "Password pernarikan berhasil diseting");
        setTimeout(() => {
            window.location.href = base_url + "/dashboard-member";
        }, 3000);
    } catch (error) {
        ToastNotification(
            "info",
            error?.response?.pesan || "Terjadi kesalahan saat mengirim data"
        );
    }
};
