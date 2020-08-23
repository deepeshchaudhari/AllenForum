/*
File Name : student-profile.js
 */
/*
Add Edit Student Work Experience
 */
function setProfileExpAction(event,type,editDelId){
    event.preventDefault();
    if (type == "add"){
        $("#exampleModalAddExp").modal('show');
        $("#profileExpAction").val("add");
    }
   else if (type == "edit"){
        $("#exampleModalAddExp").modal('show');
        $("#profileExpAction").val("edit");
        $("#editExpId").val(editDelId);
        $.post("functions/student/student-ajax-request.php",  {
            getStudentExpDetails:"getStudentExpDetailsById",expId:editDelId
            },function (response) {
            //alert(response);
            var res = response.split('^');
            $("#exp_title").val(res[1]);
            $("#exp_position").val(res[3]);
            $("#exp_description").val(res[2]);
        });
    } else if (type == "delete"){
        if (confirm("Are you sure to remove this experience from Allenforum ? ")){
            $.post("functions/student/student-ajax-request.php",{deleteStudentExperience:'deleteStudentExperience',expId:editDelId},function (response) {
                var res = response.split('^');
                if (res[1] == "deleted"){
                    getStudentExperiences();
                }
            });
        }
    }
}
$("#studentWorkExpForm").on("submit",function (e) {
   e.preventDefault();
    var title       = $('#exp_title').val();
    var position    = $('#exp_position').val();
    var description = $('#exp_description').val();
    var editExpId = $("#editExpId").val();
    var profileExpAction = $("#profileExpAction").val();
    if (title == ''){
        alert('Please enter experience title');
        $("#exp_title").focus();
    } else if (position == ''){
        alert('Postion/Designation is required !');
        $("#exp_position").focus();

    } else if(description == ''){
        alert('Please enter experience description');
        $("#exp_description").focus();
    } else{
        $("#workExpBtn").html('<i class="fa fa-spinner fa-spin" style="font-size:18px"></i> Processing...');
        $.post("functions/student/student-ajax-request.php",{
            addEditStudentExeperience:'addEditStudentExeperience',
            title:title,position:position,
            description:description,
            editExpId:editExpId,
            profileExpAction:profileExpAction
            },
            function (response) {
              //  alert(response);
                var res = response.split('^');
            if (res[1] == "saved"){
                $("#workExpBtn").html('Submit');
                $("form#studentWorkExpForm").each(function(){
                    this.reset();
                });
                $("#exampleModalAddExp").modal('hide');
                getStudentExperiences();
            }
        });
    }
});

function getStudentExperiences() {
    $.post("functions/student/student-ajax-request.php", {getStudentExpList: 'getStudentExpList'}, function (response) {
        //alert(response);
        $("#getStudentWorkExp").html(response);
         $("#loadingExp").hide();
    });
}



/*
Add Edit student Scholling section
 */

function setProfileSchoolingAction(event,type,editDelId){
    event.preventDefault();
    if (type == "add"){
        $("#exampleModalAddEditSchooling").modal('show');
        $("#studentProfileSchoolingAction").val("add");
    }
    else if (type == "edit"){
        $("#exampleModalAddEditSchooling").modal('show');
        $("#studentProfileSchoolingAction").val("edit");
        $("#editSchoolingId").val(editDelId);
        $.post("functions/student/student-ajax-request.php",  {
            getStudentSchoolingDetails:"getStudentSchoolingDetailsById",schoolingId:editDelId
        },function (response) {
            var res = response.split('^');
            $("#college_name").val(res[1]);
            $("#qualification").val(res[2]);
            $("#start_year").val(res[3])
            $("#completing_year").val(res[4]);
            $("#schooling_des").val(res[5]);
        });
    } else if (type == "delete"){
        if (confirm("Are you sure to remove this qualification from Allenforum ? ")){
            $.post("functions/student/student-ajax-request.php",{deleteStudentSchooling:'deleteStudentSchooling',schoolingId:editDelId},function (response) {
                var res = response.split('^');
                if (res[1] == "deleted"){
                    getStudentSchooling();
                }
            });
        }
    }
}

$("form#studentSchoolingAddEditForm").on("submit",function (e) {
    e.preventDefault();
    var college_name = $("#college_name").val();
    var qualification = $("#qualification").val();
    var start_year = $("#start_year").val();
    var completing_year = $("#completing_year").val();
    var schooling_des = $("#schooling_des").val();
    var studentProfileSchoolingAction = $("#studentProfileSchoolingAction").val();
    var editSchoolingId = $("#editSchoolingId").val();
    if (college_name == ""){
        alert("Please enter school or college name");
        $("#college_name").focus();
    }
    else  if (qualification == ""){
        alert("Please select your qualification");
        $("#qualification").focus();
    }
    else  if (start_year == ""){
        alert("Please select starting year of  your qualification");
        $("#start_year").focus();
    }
    else  if (completing_year == ""){
        alert("Please select completion year of  your qualification");
        $("#completing_year").focus();
    }
    else  if (schooling_des == ""){
        alert("Please give some desccription about your school/college");
        $("#completing_year").focus();
    }else{
        //alert("OK");
        $("#studentAddsSchoolingBtn").html('<i class="fa fa-spinner fa-spin" style="font-size:18px"></i> Processing...');
        $.ajax({
            url : "functions/student/student-ajax-request.php",
            method : "POST",
            data : {
                studentSchooling:'addEditStudentSchooling',
                college_name:college_name,
                qualification:qualification,
                start_year:start_year,
                completing_year:completing_year,
                schooling_des:schooling_des,
                workAction: studentProfileSchoolingAction,
                editSchoolingId:editSchoolingId

            },
            success : function (response) {
                var res = response.split('^');
                if (res[1] == "saved"){
                    $("#studentAddsSchoolingBtn").html('Submit');
                    $("form#studentSchoolingAddEditForm").each(function(){
                        this.reset();
                    });
                    $("#exampleModalAddEditSchooling").modal('hide');
                    getStudentSchooling();
                }
            }
        });
    }
});

function getStudentSchooling() {
    $.post("functions/student/student-ajax-request.php", {getStudentSchooList: 'getStudentSchooList'}, function (response) {
        //alert(response);
        $("#getSchooling").html(response);
        $("#loadingSchooling").hide();
    });
}


/*
update student main profile
 */

$("#editStudentProfile").on('submit', function(e) {
    e.preventDefault();
    $("#updateStudentProfileBtn").html('<i class="fa fa-spinner fa-spin" style="font-size:18px"></i> Processing...');
    $.ajax({
        type: 'POST',
        url: 'functions/student/student-ajax-request.php',
        data: new FormData(this),
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            var res = response.split('^');
            if (res[1] == "success") {
                alert('Your profile updated successfully !');
                $("#updateStudentProfileBtn").html('Update <i class="fa fa-check"></i> ');
                window.location.href = 'user-profile.php';
            }
        }
    });

});


function getOtherStudentProfileBelow() {
    var profileId = document.getElementById("profileId").value;

    $.ajax({
        type     : "POST",
        url      : "functions/student/student-ajax-request.php",
        data     : {otherUserProfileBelow:'otherUserProfileBelow',id : profileId},
        dataType : "html", //expect html to be returned
        success  : function (response) {

           var  data = response.split('^');
            $("#getOtherSchooling").html(data[1]);
            $("#getOtherWorkExp").html(data[2]);

        },
        complete:  function(){
            $('#loadingSchooling').hide();
            $('#loadingExp').hide();
        }
    });
}