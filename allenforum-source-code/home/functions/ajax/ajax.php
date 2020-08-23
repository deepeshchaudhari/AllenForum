<?php
session_start();
include "../../../config/configuration.php";
include_once "Ajaxfunctions.php";
if (isset($_POST['key']) == "registration"){
    $_SESSION['name'] = $_POST['firstname'];
    $_SESSION['lastname'] = $_POST['lastname'];
    $_SESSION['roll'] = $_POST['roll'];
    $_SESSION['course_program'] = $_POST['course_program'];
    $_SESSION['department_branch'] = $_POST['department_branch'];
    $_SESSION['student_year'] = $_POST['student_year'];
    $_SESSION['useremail'] = $_POST['useremail'];
    $_SESSION['userpassword'] = sha1($_POST['userpassword']);
    $_SESSION['otpGenerated'] = generateOTP();
    echo "sucess^tempSaved^".$_SESSION['otpGenerated'];

}

if (isset($_POST['otpVerify']) == "verifyOtp"){
    $otpField = $_POST['otpField'];
    if ($otpField == $_SESSION['otpGenerated']){
        $ajaxObject = new Ajaxfunctions();
        $saveData = $ajaxObject->saveRegistration($connection, $_SESSION['name']." ".$_SESSION['lastname'],$_SESSION['roll'],
            $_SESSION['course_program'],$_SESSION['department_branch'],$_SESSION['student_year'],$_SESSION['useremail'],
            $_SESSION['userpassword'],'student');
        echo "test^verified^saved";
    }else{
        echo "test^wrong";
    }
}

if (isset($_POST['otp']) == "generate"){
    $_SESSION['otpGenerated'] = generateOTP();
    echo "sucess^generated^".$_SESSION['otpGenerated'];
}


function generateOTP()
{
  return  substr(rand(),0,4);
}

