import { $ } from "../../../js/module/helper";

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
