/*
File Name : admin-work.js
 */

/*
Add Students
 */
$("form#addStudentForm").on('submit',function (e) {
    e.preventDefault();
    $("#addStudentBtn").html('Adding...');
    $("#addStudentLoader").show();
    var name = $("#student_name").val();
    var email = $("#student_email").val();
  //  var password = $("#student_pass").val();
    var contact = $("#student_contact").val();
    var programData = $("#course_program").val();
    var splited = programData.split('^');
    var department = $("#department_branch").val();
    var roll = $("#student_roll_no").val();
    var year = $("#student_year").val();
    if (isNaN(contact)){
       alert("Please Enter a Valid Contact Number");
    } else{
        $.post('functions/admin/admin-ajax-request.php',
            {student:'addStudent',
                name:name,
                email:email,
                contact:contact,
                program:splited[0],
                department:department,
                roll:roll,
                year:year
            },function (res) {
            alert(res);
            $("#addStudentLoader").hide();
            $("#addStudentBtn").html(' <i class="fa fa-check-circle"></i> Add Student</button>');
            $("form#addStudentForm").each(function () {
                this.reset();
            });
            $("#department_branch").html(' <option value="">Department</option>');
        });
    }
});

/*
Add Faculty
 */

$("form#addFacultyForm").on('submit',function (e) {
    e.preventDefault();
    $("#addFaculyBtn").html('Adding...');
    $("#addFacultyLoader").show();
    var faculty_name = $("#faculty_name").val();
    var faculty_email = $("#faculty_email").val();
    var faculty_pass = $("#faculty_pass").val();
    var faculty_contact = $("#faculty_contact").val();
    var programData = $("#course_program").val();
    var splited = programData.split('^');
    var department_branch = $("#department_branch").val();
    alert(department_branch);

    if (isNaN(faculty_contact)){
        alert("Please Enter a Valid Contact Number");
    } else{
        $.post('functions/admin/admin-ajax-request.php',{faculty:'addFaculty',faculty_name:faculty_name,faculty_email:faculty_email,faculty_pass:faculty_pass,faculty_contact:faculty_contact,course_program:splited[0],department_branch:department_branch},function (response) {
            alert(response);
            $("#addFacultyLoader").hide();
            $("#addFaculyBtn").html(' <i class="fa fa-check-circle"></i> Add Student</button>');
            $("form#addFacultyForm").each(function () {
                this.reset();
            });
            $("#department_branch").html(' <option value="">Department</option>');


        });
    }
});



/*
Edit Admin Profile
 */

function getAdminProfileDetailsForEdit(adminId) {
    $.post("functions/admin/admin-ajax-request.php",{editAdmin:'EditAdminProfile',adminId:adminId},function (response) {
       // alert(response);
        var res = response.split('^');
        $("#adminName").val(res[1]);
        $("#adminEmail").val(res[2]);
        $("#adminPrevHiddenPassword").val(res[3]);
        $("#adminContact").val(res[4]);
        $("#adminProfileHidden").val(res[5]);

        $("#adminProfileNameLabel").html(res[1]);
        $("#adminProfileContactLabel").html(res[4]);
        $("#adminProfileDeptLabel").html('Admin');
        $("#adminProfileEmailLabel").html(res[2]);
    });
}




$("form#updateAdminProfile").on("submit",function(e){
    e.preventDefault();
    var name =   $("#adminName").val();
    var email = $("#adminEmail").val();
    var password = $("#adminNewPassword").val();
    var contact = $("#adminContact").val();
    var profile =  $("#adminProfileHidden").val();
    if (name == ""){
        alert("Please Enter name");
        $("#adminName").focus();
    } else  if (email == ""){
        alert("Please Enter Email");
        $("#adminEmail").focus();
    }
    else  if (contact == ""){
        alert("Please Enter Contact");
        $("#adminContact").focus();
    } else {
        $("#updateAdminProfileBtn").html('<i class="fa fa-spinner fa-spin" style="font-size:18px"></i> Updating...');
        $.ajax({
            url: "functions/admin/admin-ajax-request.php", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData: false,        // To send DOMDocument or non processed data file it is set to false
            success: function (data)   // A function to be called if request succeeds
            {
              //  alert(data);
                var response = data.split('^');
                if (response[1] == "adminProfileUpdated") {
                    alert("Profile has been updated !!!");
                    $("#modalEditAdminProfile").modal('hide');
                    window.location.reload();

                }
            }
        });
    }
});

/*
Add Receptionist
 */

$("form#addReceptionistForm").on("submit",function (e) {
    e.preventDefault();
    $("#addReceptionistBtn").html('<i class="fa fa-spinner fa-spin" style="font-size:18px"></i> Processing...');
    addReceptionist();
});
function addReceptionist() {
    var receptionist_name = $("#receptionist_name").val();
    var receptionist_email = $("#receptionist_email").val();
    var receptionist_pass = $("#receptionist_pass").val();
    var receptionist_contact = $("#receptionist_contact").val();
    var receptionist_department = $("#receptionist_department").val();
    $.ajax({
        url : "functions/admin/admin-ajax-request.php",
        method: "POST",
        data : {
            addReceptionist:'addReceptionist',
            receptionist_name:receptionist_name,
            receptionist_email:receptionist_email,
            receptionist_pass:receptionist_pass,
            receptionist_contact:receptionist_contact,
            receptionist_department:receptionist_department
        },
        success : function (response) {
           // alert(response);
            var res = response.split('^');
            if (res[1] == "reseptionistadded"){
                $("#addReceptionistBtn").html(' <i class="fa fa-check-circle"></i> Add Receptionist');
                $("#formSuccessMessage").show();
                setTimeout(function() {
                    $("#formSuccessMessage").hide('blind', {}, 500);
                }, 2000);
                $("form#addReceptionistForm").each(function () {
                    this.reset();
                });
            }
        }
    });

}

/*
Add Librarian
 */

$("form#addEditLibrarianForm").on("submit",function (e) {
   e.preventDefault();
   var librarian_name = $("#librarian_name").val();
   var librarian_email = $("#librarian_email").val();
   var librarian_pass = $("#librarian_pass").val();
   var librarian_contact = $("#librarian_contact").val();
   var librarian_department = $("#librarian_department").val();
   var manageLibrarianAction = $("#manageLibrarianAction").val();
   if (librarian_name == ""){
       alert("Please enter librarian name");
       $("#librarian_name").focus();
   } else  if (librarian_email == ""){
       alert("Please enter librarian email");
       $("#librarian_email").focus();
   }
   else  if (librarian_pass == ""){
       alert("Please create librarian password");
       $("#librarian_pass").focus();
   }
   else  if (librarian_contact == ""){
       alert("Please enter librarian contact");
       $("#librarian_contact").focus();
   }
   else  if (librarian_department == ""){
       alert("Please select librarian department");
       $("#librarian_contact").focus();
   }
   else  {
       $("#addEditLibrarianBtn").html('<i class="fa fa-spinner fa-spin" style="font-size:18px"></i> Processing...');
       $.ajax({
        url : "functions/admin/admin-ajax-request.php",
        method : "POST",
        data : {
            adminActionAddLibrarian:'adminAddsLibrarian',
            librarian_name:librarian_name,
            librarian_email:librarian_email,
            librarian_pass:librarian_pass,
            librarian_contact:librarian_contact,
            librarian_department:librarian_department,
            manageLibrarianAction:manageLibrarianAction
        },
        success :function (responsse) {
            var res = responsse.split('^');
            if (res[1] == "librarianAdded"){
                $("#formSuccessMessage").show();
                setTimeout(function() {
                    $("#formSuccessMessage").hide('blind', {}, 500);
                }, 2000);
                $("form#addEditLibrarianForm").each(function () {
                    this.reset();
                });

                $("#addEditLibrarianBtn").html('<i class="fa fa-check-circle"></i> Add Librarian');
            }
        }
    });
   }
});


/*
Manage Sheet data
 */


$("form#manageDataWithSheetForm").on("submit",function (e) {
   e.preventDefault();
   var selectUser = $("#manageSheetTypeForUser").val();
   var manageSheetFile = $("#manageSheetFile").val();
   if (selectUser == ""){
       alert("Please select the user type");
       $("#manageSheetTypeForUser").focus();
   } else if (manageSheetFile == ""){
       alert("Please select a CSV file");
       $("#manageSheetFile").focus();
   } else{
       alert("Now ploading...");
       $("#manageDataWithSheetBtn").html('<i class="fa fa-spinner fa-spin" style="font-size:18px"></i> Uploading...');
       $.ajax({
           url: "functions/admin/admin-ajax-request.php", // Url to which the request is send
           type: "POST",             // Type of request to be send, called as method
           data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
           contentType: false,       // The content type used when sending data to the server.
           cache: false,             // To unable request pages to be cached
           processData: false,        // To send DOMDocument or non processed data file it is set to false
           success: function (response)   // A function to be called if request succeeds
           {
               var res = response.split('^');
               if (res[1] == "uploaded"){
                   alert("Sheet Uploaded Successfully !");
                   $("#formSuccessMessage").show();
                   setTimeout(function() {
                       $("#formSuccessMessage").hide('blind', {}, 500);
                   }, 2000);
                   $("form#manageDataWithSheetForm").each(function () {
                       this.reset();
                   });

                   $("#manageDataWithSheetBtn").html('<i class="fa fa-upload"></i> Upload');
               }
           }
       });
   }
});

/*
Load Admin Dashboard Counts
 */

function getAdminDasboardData() {
   $.post("functions/admin/admin-ajax-request.php",{getAdminDashboard:'getAdminDashboardCounts'},function (response) {
       // alert(response);
       var res = response.split('^');
       var studentCount = res[1];
       var facultyCount = res[2];
       var receptionistCount = res[3];
       var librarianCouunt = res[4];
       $("#totalFaculyCount").html(facultyCount);
       $("#totalStudentCount").html(studentCount);
       $("#totalReceptionist").html(receptionistCount);
       $("#totalLibrarian").html(librarianCouunt);

   });
}


/*
Allenforum report generations
 */

function getForumReports() {
    var reportType = $("#reportType").val();
    $("#reportLoader").show();
    $.ajax({
        url : "functions/admin/admin-ajax-request.php",
        data :{
            getAllenforumReport:"getAllenforumReport",
            reportType : reportType
        },
        method: "POST",
        success: function (response) {
            //alert(response);
           $("#reportData").html(response);
            $("#reportLoader").hide();
            $("#exportReportLink").attr("href", "functions/admin/getReports.php?reportType="+reportType);
        }
    });
}
