/*
File Name : faculty-script.js
 */
/*
Add Official Posts
 */

$("form#addpostOfficialForm").on("submit",function (e) {
    e.preventDefault();
    var postedFor = $("#postedFor").val();
    var officialPostTitle = $("#officialPostTitle").val();
    var officialPostText = CKEDITOR.instances.officialPostText.getData();

    if (postedFor == ""){
        alert("Please select for which the post is");
        $("#postedFor").focus();
    } else if (officialPostTitle == ""){
        alert("Please enter post title");
        $("#officialPostTitle").focus();
    }
    else if (officialPostText == ""){
        alert("Please type the post");
        $("#officialPostText").focus();
    }else {
        $("#addOfficialNoticeBtn").html('<i class="fa fa-spinner fa-spin" style="font-size:18px"></i> Processing...');
        $.ajax({
            url: "functions/faculty/faculty-ajax-request.php",
            method: "POST",
            data: {
                manageOfficialPost:'manageOfficialPost',
                postedFor: postedFor,
                officialPostTitle: officialPostTitle,
                officialPostText: officialPostText,
            },
            success: function (response) {
                var res = response.split('^');
                if (res[1] == "posted") {
                    $("form#addpostOfficialForm").each(function(){
                        this.reset();
                    });
                    $("#addOfficialNoticeBtn").html('Send <i class="fa fa-arrow-circle-right"></i>');

                    window.location.href = "forum-dicussion.php?college_post=active";
                }
            }
        });
    }

});

/*
edit official post
 */

$("form#editpostOfficialForm").on("submit",function (e) {
    e.preventDefault();
    var postedFor = $("#postedFor").val();
    var officialPostTitle = $("#officialPostTitle").val();
    var officialPostText = CKEDITOR.instances.officialPostText.getData();
    var editPostId = $("#editPostId").val();

    if (postedFor == ""){
        alert("Please select for which the post is");
        $("#postedFor").focus();
    } else if (officialPostTitle == ""){
        alert("Please enter post title");
        $("#officialPostTitle").focus();
    }
    else if (officialPostText == ""){
        alert("Please type the post");
        $("#officialPostText").focus();
    }else {
        $("#editOfficialNoticeBtn").html('<i class="fa fa-spinner fa-spin" style="font-size:18px"></i> Processing...');
        $.ajax({
            url: "functions/faculty/faculty-ajax-request.php",
            method: "POST",
            data: {
                editOfficialPost:'editOfficialPost',
                postedFor: postedFor,
                officialPostTitle: officialPostTitle,
                officialPostText: officialPostText,
                editPostId:editPostId
            },
            success: function (response) {
                var res = response.split('^');
                if (res[1] == "edited") {
                    $("form#editpostOfficialForm").each(function(){
                        this.reset();
                    });
                    $("#editOfficialNoticeBtn").html('Send <i class="fa fa-arrow-circle-right"></i>');

                    window.location.href = "forum-dicussion.php?college_post=active";
                }
            }
        });
    }

});

/*
update faculty profile
 */

/*
get the logged in user details
 */
function getFacultyDetails(){
    $.post("functions/faculty/faculty-ajax-request.php",{getFacultyDetails:'getFacultyDetailsToEdit'},function (response) {
        //alert(response);
        var res = response.split('^');
        var name = res[1];
        var email = res[2];
        var contact = res[3];
        var program = res[4];
        var department = res[5];
        var profilePrev  = res[6];
        var emailPer = res[7];

        $("#facultyName").val(name);
        $("#email").val(email);
        $("#facultyContact").val(contact);
        $("#course_program").val(program);
        $("#department_branch").val(department);
        $("#faculyProfileHidden").val(profilePrev);
        $("#emailPersmission").val(emailPer);
    });
}

$("form#updateFacultyProfile").on("submit",function (e) {
    e.preventDefault();
    var email = $("#email").val();
    var password = $("#newPassword").val();
    var facultyName = $("#facultyName").val();
    var facultyContact = $("#facultyContact").val();
    var emailPersmission = $("#emailPersmission").val();
    var course_program = $("#course_program").val();
    var department_branch = $("#department_branch").val();
    var faculyProfile = $("#faculyProfile").val();
    var faculyProfileHidden = $("#faculyProfileHidden").val();
    var filter = /^([\w-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([\w-]+\.)+))([a-zA-Z]{2,4}|[0-9]{1,3})(\]?)$/;


    if (email == ""){
        alert("Please enter the email");
        $("#email").focus();
    } else if (! filter.test(email)) {
        alert("Please enter valid email");
        $("#email").focus();
    }
    else if (facultyName == ""){
        alert("Please enter the name ");
        $("#facultyName").focus();
    } else if (facultyContact == ""){
        alert("Please enter the contact ");
        $("#facultyContact").focus();
    }
    else if (emailPersmission == ""){
        alert("Please select the email persmission ");
        $("#facultyName").focus();
    }
    else if (course_program == ""){
        alert("Please select the program ");
        $("#course_program").focus();
    }
    else if (department_branch == ""){
        alert("Please select the department ");
        $("#department_branch").focus();
    } else{
        $("#updateFacultyProfileBtn").html('<i class="fa fa-spinner fa-spin" style="font-size:18px"></i> Updating...');
        $.ajax({
            url: "functions/faculty/faculty-ajax-request.php", // Url to which the request is send
            type: "POST",             // Type of request to be send, called as method
            data: new FormData(this), // Data sent to server, a set of key/value pairs (i.e. form fields and values)
            contentType: false,       // The content type used when sending data to the server.
            cache: false,             // To unable request pages to be cached
            processData: false,        // To send DOMDocument or non processed data file it is set to false
            success: function (response)   // A function to be called if request succeeds
            {
                var  res = response.split('^');
               if (res[1] == "profileUpdated")
               {
                   window.location.reload();
               }
            }
        });
    }

});

