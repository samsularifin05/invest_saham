import Axios from "axios";
import { base_url } from "./base_url.js";
import $ from "jquery";

window.Swal = require("sweetalert2");

export { $ };
export function getData(endpoint) {
    let config = {
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    };
    return new Promise((resolve, reject) => {
        Axios.get(base_url + endpoint, config)
            .then((res) => {
                resolve(res);
            })
            .catch((err) => {
                reject(err);
            });
    });
}
export function putData(endpoint, form_data) {
    let config = {
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    };
    let data = serializeObject(form_data);
    return new Promise((resolve, reject) => {
        Axios.put(base_url + endpoint, data, config)
            .then((res) => {
                resolve(res);
            })
            .catch((err) => {
                reject(err);
            });
    });
}
export function postDataWithImage(endpoint, data) {
    let config = {
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
            "Content-Type": "multipart/form-data",
        },
    };
    console.log(data);
    // let data = serializeObject(form_data);
    return new Promise((resolve, reject) => {
        Axios.post(base_url + endpoint, data, config)
            .then((res) => {
                resolve(res);
            })
            .catch((err) => {
                reject(err);
            });
    });
}
export function postData(endpoint, form_data, formObject) {
    let config = {
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    };
    let data = serializeObject(form_data);
    return new Promise((resolve, reject) => {
        Axios.post(base_url + endpoint, data, config)
            .then((res) => {
                resolve(res);
            })
            .catch((err) => {
                reject(err);
            });
    });
}
export function deteletData(endpoint) {
    let config = {
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    };
    return new Promise((resolve, reject) => {
        Axios.delete(base_url + endpoint, config)
            .then((res) => {
                resolve(res);
            })
            .catch((err) => {
                reject(err);
            });
    });
}

export function getDataTabel(id_tabel, url, columns) {
    $(`#${id_tabel}`).DataTable({
        pageLength: 10,
        lengthChange: true,
        bFilter: true,
        destroy: true,
        processing: true,
        serverSide: true,
        responsive: true,
        oLanguage: {
            sZeroRecords: "Tidak Ada Data",
            sSearch: "Pencarian _INPUT_",
            sLengthMenu: "_MENU_",
            sInfo: "Menampilkan _START_ - _END_ dari _TOTAL_ data",
            sInfoEmpty: "",
            oPaginate: {
                sNext: "<i class='fa fa-angle-right'></i>",
                sPrevious: "<i class='fa fa-angle-left'></i>",
            },
        },
        ajax: {
            url: base_url + url,
            type: "GET",
        },
        columns,
    });
}
const Toast = Swal.mixin({
    toast: true,
    position: "top-end",
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    didOpen: (toast) => {
        toast.addEventListener("mouseenter", Swal.stopTimer);
        toast.addEventListener("mouseleave", Swal.resumeTimer);
    },
});
export function serializeObject(obj) {
    var jsn = {};
    $.each(obj, function () {
        if (jsn[this.name]) {
            if (!jsn[this.name].push) {
                jsn[this.name] = [jsn[this.name]];
            }
            jsn[this.name].push(this.value || "");
        } else {
            jsn[this.name] = this.value || "";
        }
    });
    return jsn;
}

export function ToastNotification(info, message) {
    Toast.fire({
        icon: info,
        title: message,
    });
}
