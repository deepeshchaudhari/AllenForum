/*
File Name : career.js
 */
/*
Add Edit Companies
 */
function addEditComapanyInfo(type,editId) {
    if (type == "add") {
        $("#modalAddCompanyInfo").modal('show');
        $("#careerCaption").html("<b>Add Company</b>");
        $("#worktype").val("add");
    } else if (type == "edit") {
        $("#modalAddCompanyInfo").modal('show');
        $("#careerCaption").html("<b>Edit Company</b>");
        $("#worktype").val("edit");
        $("#companyEditId").val(editId);

        /* put the previous form values to edit */
        $.post("functions/career/career-ajax-request.php", {
            getCompanyDetail: 'getCompanyDetailById',
            companyId: editId
        }, function (response) {
            //alert(response);
            var data = response.split('^');
            var cname = data[1];
            var cwebsite = data[2];
            var cCategory = data[3];
            var cdescription = data[4];
            var cLogo = data[5];

            $("#company_name").val(cname);
            $("#company_website").val(cwebsite);
            $("#company_category").val(cCategory);
            $("#company_description").val(cdescription);
            $("#company_logoHidden").val(cLogo);

        });
    } else if (type == "delete") {
       if (confirm("Are You sure to remove this company from this list")){
           $.post("functions/career/career-ajax-request.php", {
               deleteCompany: 'deleteCompanyDetailById',
               companyId: editId
           }, function (response) {
               var del = response.split('^');
               if (del[1] == "deleted") {
                   getCompanyList();
               }
           });
       }
    }
}

$("form#addComapnyInfo").on('submit', function (event) {
    event.preventDefault();
    var company_name = $("#company_name").val();
    var company_website = $("#company_website").val();
    var company_category = $("#company_category").val();
    if (company_name == "") {
        alert("Please Enter Company name");
        $("#company_name").focus();
    } else if (company_website == "") {
        alert("Please Enter Company Website");
        $("#company_website").focus();

    } else if (company_category == "") {
        alert("Please Select Company Category");
        $("#company_category").focus();
    } else {
        // proceed to save the form values
        $("#addComapnyInfoBtn").hide();
        $("#addComapnyInfoBtnLoader").show();
        $.ajax({
            url: "functions/career/career-ajax-request.php", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData: false,        // To send DOMDocument or non processed data file it is set to false
            success: function (data)   // A function to be called if request succeeds
            {
               var response = data.split('^');
               if (response[1] == "success") {
                   $("#addComapnyInfoBtn").show();
                   $("#addComapnyInfoBtnLoader").hide();
                   $("#modalAddCompanyInfo").modal('hide');
                   $("form#addComapnyInfo").each(function () {
                       this.reset();
                   });
                   getCompanyList();
               }
            }
        });
    }

});

/*
Display the list of companies
 */

function getCompanyList() {
    $("#companyListLoader").show();
    $.post("functions/career/career-ajax-request.php",{listCompany:"listCompanyDetails"},function (response) {
        $("#load-comapany-list").html(response);
        $("#companyListLoader").hide();
    })
}


/*
function searchCompany() {
  //  alert("calledd");
    $("#companytitle").hide();
}*/
