import { $, postData, serializeObject } from "../../../js/module/helper";


window.loginMember = async function (e) {
    e.preventDefault();
    let form_data = $("#form_login_member").serializeArray();
    // let databaru = serializeObject(form_data);
    console.log(form_data)

    try {
        let data = await postData('/cek-login-member',form_data)
        console.log(data)
    } catch (error) {
        console.log(error)
    }
};
