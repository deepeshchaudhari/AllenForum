/*
File Name : file-extension-validation.js
 */
function validateCompanyLogo() {
    var allowedFiles = [".png", ".jpeg", ".jpg"];
    var fileUpload = document.getElementById("company_logo");
   // var lblError = document.getElementById("lblError");
    var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");
    if (!regex.test(fileUpload.value.toLowerCase())) {
      //  lblError.innerHTML = "Please upload files having extensions: <b>" + allowedFiles.join(', ') + "</b> only.";
        alert("Please Upload Valid File");
        document.getElementById("company_logo").value = "";
        return false;
    }else {
        return true;
    }
}

function validateAdminProfile() {
    var allowedFiles = [".png", ".jpeg", ".jpg"];
    var fileUpload = document.getElementById("admin_profile_pic");
    // var lblError = document.getElementById("lblError");
    var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");
    if (!regex.test(fileUpload.value.toLowerCase())) {
        //  lblError.innerHTML = "Please upload files having extensions: <b>" + allowedFiles.join(', ') + "</b> only.";
        alert("Please Upload Valid File");
        document.getElementById("admin_profile_pic").value = "";
        return false;
    }else {
        return true;
    }
}
function validateDataManageFileUpload() {
    var allowedFiles = [".CSV", ".csv"];
    var fileUpload = document.getElementById("manageSheetFile");
    // var lblError = document.getElementById("lblError");
    var regex = new RegExp("([a-zA-Z0-9\s_\\.\-:])+(" + allowedFiles.join('|') + ")$");
    if (!regex.test(fileUpload.value.toLowerCase())) {
        //  lblError.innerHTML = "Please upload files having extensions: <b>" + allowedFiles.join(', ') + "</b> only.";
        alert("Please Upload Valid File");
        document.getElementById("manageSheetFile").value = "";
        return false;
    }else {
        return true;
    }
}


