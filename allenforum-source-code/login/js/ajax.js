
var baseurl = "http://localhost/projects/allenforum/home/functions/ajax/ajax.php";

$("form#registrationForm").on("submit",function(e){
    e.preventDefault();

    var name = $("#name").val();
    var lastname =$("#lastname").val();
    var roll =$("#userroll").val();
    var course_program =$("#course_program").val();
    var department_branch =$("#department_branch").val();
    var student_year =$("#student_year").val();
    var useremail =$("#useremail").val();
    var userpassword =$("#userpassword").val();
    var repassword =$("#repassword").val();

$("#create_accountBtn").html('<i class="fa fa-spinner fa-spin"></i>');
    $.post(baseurl, {
        key : "registration",
        firstname:name,
        lastname:lastname,
        roll:roll,
        course_program:course_program,
        department_branch:department_branch,
        student_year:student_year,
        useremail:useremail,
        userpassword:userpassword,
        repassword:repassword
    },function (response) {
        //alert(response);
        var data = response.split('^');
        if (data[0] == "sucess"){
            //alert("Form saved");
            $("#registrationForm").hide('fast');
            $("#otpForm").show('fast');
        }
    });

});

$("form#otpForm").on("submit",function (e) {
    e.preventDefault();

    var otpField = $("#otpField").val();

    if (otpField == ""){
        alert("Plesase enter otp");
    } else{
        $.post(baseurl,{otpVerify :"verifyOtp",otpField:otpField},function (response) {
            //alert(response);
            var data = response.split('^');
            if (data[1] == "verified" && data[2] == "saved"){
                //alert("OTP verified");
                $("#otpForm").hide('fast');
                $("#sucessMessage").show('fast');
            } else{
                alert("Your entered Wrong OTP");
            }
        });
    }
});

function gerateOTP() {
    $.post(baseurl,{otp :"generate"},function (response) {
        //alert(response);
    });
}

/*========================================================================================
                                  VALIDATION CODE
   ========================================================================================*/

function validateEmail(inputText) {
    var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
    if(inputText.match(mailformat)) {
        return true;
    } else{
        return false;
    }
}

function validatePhoneNumber(inputtxt) {
    var phonenoPattern = /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
    if( inputtxt.match(phonenoPattern) ) {
        return true;
    }
    else {
        return false;
    }
}
