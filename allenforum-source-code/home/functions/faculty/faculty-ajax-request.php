<?php include "../../../config/session_header.php";?>
<?php include "../../../config/configuration.php";?>
<?php include_once "Faculty.php";?>
<?php $faculty = new Faculty();?>
<?php
/*
 * File Name : faculty-ajax-request.php
 * Ajax Request File
 */
/*
 * Add Officials Post by higher authorities
 */
if (isset($_POST['manageOfficialPost']) == "manageOfficialPost")
{
    $postedFor = $_POST['postedFor'];
    $officialPostTitle = $_POST['officialPostTitle'];
    $officialPostText = $_POST['officialPostText'];
    $userID = $_SESSION['userId'];
    $userRole = $_SESSION['userrole'];
    $save  = $faculty->addOfficialPost($connection,$postedFor,$officialPostTitle,$officialPostText,$userID,$userRole);
    if ($save){
        echo 'test^posted';
    }
}

/*
 * edit offcial post
 */

if (isset($_POST['editOfficialPost']) == "editOfficialPost")
{
    $postedFor = $_POST['postedFor'];
    $officialPostTitle = $_POST['officialPostTitle'];
    $officialPostText = $_POST['officialPostText'];
    $userID = $_SESSION['userId'];
    $userRole = $_SESSION['userrole'];
    $editPostId = base64_decode($_POST['editPostId']);
  //  echo $editPostId; die();
    $saveEdit  = $faculty->editOfficialPost($connection,$postedFor,$officialPostTitle,$officialPostText,$userID,$userRole,$editPostId);
    if ($saveEdit){
        echo 'test^edited';
    }
}

/*
 * get Faculty details to edit
 */
if (isset($_POST['getFacultyDetails']) == "getFacultyDetailsToEdit"){
    $userId = $_SESSION['userId'];
    $details = $faculty->getFacultyDetailsToEdit($connection,$userId);
    if ($details){
       $facultyDetails = $details->fetch_object();
       echo 'test^'.$facultyDetails->name.'^'.$_SESSION['userEmail'].'^'.$facultyDetails->contact.'^'.$facultyDetails->program.'^'.$facultyDetails->department.'^'.$facultyDetails->profile.'^'.$facultyDetails->emailSms;
    }
}

/*
 * update faculty profile after form submission
 */

if (isset($_POST['actionUpdateFacultyProfile']) == "actionUpdateFacultyProfile"){

    $faculyProfileHidden = $_POST['faculyProfileHidden'];
    $newPassword = "";
    $facultyProfilePic = "";
    if ($_FILES['faculyProfile']['tmp_name']){
        if ($faculyProfileHidden){
            /* remove the exsting logo */
            unlink("../../uploads/profilePic/faculties/".$faculyProfileHidden);
        }
        $faculyProfileTmp = $_FILES['faculyProfile']['tmp_name'];
        $facultyProfilePic = $_FILES['faculyProfile']['name'];
        $directory = "../../uploads/profilePic/faculties/";
        move_uploaded_file($faculyProfileTmp,$directory.$facultyProfilePic);
    } else{
        $facultyProfilePic = $faculyProfileHidden;
    }

    $facultyEmail = $_POST['email'];
    if (isset($_POST['newPassword'])){
        $newPassword = $_POST['newPassword'];
    }
    $facultyName  = $_POST['facultyName'];
    $facultyContact = $_POST['facultyContact'];
    $emailPersmission = $_POST['emailPersmission'];
    $program = $_POST['course_program'];
    $department = $_POST['department_branch'];
    $userId = $_SESSION['userId'];
    $loginId = $_SESSION['loginId'];
    $saveProfile = $faculty->saveFacultyProfile($connection,$facultyName,$facultyEmail,$facultyContact,$facultyProfilePic,$newPassword,$program,$department,$emailPersmission,$userId,$loginId);
    if ($saveProfile){
        echo 'test^profileUpdated';
    }
}







