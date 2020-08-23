<?php
include "../../../config/session_header.php";
include "../../../config/configuration.php";
include_once "Students.php";
$student = new Students();

/*
 * File Name : student-ajax-request.php
 * Ajax Request File
 */

/*
 * add Edit Company Information for students
 */
if ( isset($_POST['addEditStudentExeperience']) == "addEditStudentExeperience" ) {
    $title = $_POST['title'];
    $position = $_POST['position'];
    $description = $_POST['description'];
    $editExpId = $_POST['editExpId'];
    $profileExpAction = $_POST['profileExpAction'];
    $userId = $_SESSION['userId'];
    $saveExp = $student->addEditStudentExperience($connection,$title,$position,$description,$userId,$profileExpAction,$editExpId);
    if ($saveExp){
        echo "test^saved";
    }

}

/*
 * Get Student Experience List
 */

if (isset($_POST['getStudentExpList']) == 'getStudentExpList'){
    $userId = $_SESSION['userId'];
    $studentExp = $student->getStudentExperienceListByUserId($connection,$userId);
    $experience = '';
    if ($studentExp->num_rows > 0){
        while ($row = $studentExp->fetch_object()){
            $experience .= '
             <div class="col-lg-12">
                <table>
                    <tr>
                        <td>
                            <img src="ownImages/student/profile/user-experience-icon.png" width="50" height="70"/>
                        </td>
                        <td>
                            <p style="vertical-align:text-top">
                                <span class="lead">'.$row->title.'</span><br/>
                                '.$row->description.'<br/>
                                <b>'.$row->position.'</b>
                            </p>
                        </td>
                        <div class="exp-col-2-heading">
                            <a href="#"><i class="glyphicon glyphicon-pencil  fa-1x" onclick="setProfileExpAction(event,\'edit\',\''.$row->id.'\');"></i></a>
                            <a href="#"><i class="glyphicon glyphicon-remove-sign" style="color: red" onclick="setProfileExpAction(event,\'delete\',\''.$row->id.'\');"></i></a>
                        </div>
                    </tr>
                </table>
                <img src="ownImages/other/line.png" width="100%" height="1"/>
            </div>
            ';
        }
        echo $experience;
    }
}

/*
 * Get Student Experience Details by id to edit and delete
 */

if (isset($_POST['getStudentExpDetails']) == "getStudentExpDetailsById"){
    $expId = $_POST['expId'];
    $userId = $_SESSION['userId'];
    $details = $student->getStudentExpDetailsByExpId($connection,$expId,$userId);
    if ($details->num_rows > 0) {
        $expDetails = $details->fetch_object();
        echo 'test^'.$expDetails->title.'^'.$expDetails->description.'^'.$expDetails->position;
    }
}

/*
 * Delete Student Experiences
 */

if (isset($_POST['deleteStudentExperience']) == "deleteStudentExperience"){
    $expId = $_POST['expId'];
    $userId = $_SESSION['userId'];
    $deleteExperience = $student->deleteStudentExperience($connection,$expId,$userId);
    if ($deleteExperience){
        echo 'test^deleted';
    }
}


/******************************************************************************
 * Add / Edit/fetch/delete Student Schooling Section
 */

if (isset($_POST['studentSchooling']) == "addEditStudentSchooling"){
    $college_name = $_POST['college_name'];
    $qualification = $_POST['qualification'];
    $start_year = $_POST['start_year'];
    $completing_year = $_POST['completing_year'];
    $schooling_des = $_POST['schooling_des'];
    $workAction  = $_POST['workAction'];
    $userId = $_SESSION['userId'];
    $editSchoolingId = $_POST['editSchoolingId'];
    $saveSchooling = $student->saveStudentSchooling($connection,$userId,$college_name,$qualification,$start_year,$completing_year,$schooling_des,$workAction,$editSchoolingId);
    if ($saveSchooling){
        echo 'test^saved';
    }
}

if (isset($_POST['getStudentSchooList']) == "getStudentSchooList")
{
    $userId = $_SESSION['userId'];
    $schooling = $student->getStudentSchoolingListByUserId($connection,$userId);
    $schoolingData = "";
    if ($schooling->num_rows > 0 )
    {
        while ($row = $schooling->fetch_object())
        {
            $schoolingData .='
            <div class="col-lg-12">
                <table>
                    <tr>
                        <td><img src="ownImages/student/profile/education-icon.png" width="50" height="50"></td>
                        <td>
                            <p style="vertical-align:text-top;">
                                <span class="lead">'.$row->collegeName.'</span><br/>
                                <span>'.$row->collegeAddress.'</span><br/>
                                    <span>'.$row->qualification.'</span>
                                <b>'.$row->startYear.'-'.$row->completionYear.'</b><br/>
                            </p>
                        </td>
                        <div class="exp-col-2-heading">
                            <a href="#"><i class="glyphicon glyphicon-pencil" onclick="setProfileSchoolingAction(event,\'edit\',\''.$row->id.'\');"></i></a>
                            <a href="#"><i class="glyphicon glyphicon-remove-sign" style="color: red" onclick="setProfileSchoolingAction(event,\'delete\',\''.$row->id.'\');"> </i></a>
                        </div>
                    </tr>
                </table>
                <img src="ownImages/other/line.png" width="100%" height="1"/>
            </div>
            ';
        }
    }
    echo $schoolingData;

}

/*get schooling details by id for edit */
if (isset($_POST['getStudentSchoolingDetails']) == "getStudentSchoolingDetailsById"){
    $schoolingId = $_POST['schoolingId'];
    $userId = $_SESSION['userId'];
    $detail = $student->getSchoolingDetailBySchId($connection,$schoolingId,$userId);
    if ($detail->num_rows > 0){
        $schoolingDetail = $detail->fetch_object();
        echo 'test^'.$schoolingDetail->collegeName.'^'.$schoolingDetail->qualification.'^'.$schoolingDetail->startYear.'^'.$schoolingDetail->completionYear.'^'.$schoolingDetail->collegeAddress;
    }
}

if (isset($_POST['deleteStudentSchooling']) == "deleteStudentSchooling"){
    $schoolingId = $_POST['schoolingId'];
    $userId = $_SESSION['userId'];
    $deleteStudentSchooling = $student->deleteStudentSchooling($connection,$schoolingId,$userId);
    if ($deleteStudentSchooling){
        echo 'test^deleted';
    }
}


/*
 * Update Student main profile
 */
if (isset($_POST['studentProfileUpdate']) == "studentProfileUpdate"){
    $name = $_POST['student_name'];
    $college = $_POST['college_name'];
    $course = $_POST['course_program']; // 0 -> ^,1->B.Tech
    $department = $_POST['department_branch'];
    $year = $_POST['year'];
    $description = $_POST['description'];
    $prev_profile = $_POST['prev_profile'];
    $contact = $_POST['contact'];
    $userId = $_SESSION['userId'];

    $profilePicName = "";
    if ($_FILES['profile_pic']['tmp_name']){
        if ($prev_profile){
            /* remove the exsting logo */
            unlink("../../uploads/profilePic/students/".$prev_profile);
        }
        $profilePicTmp = $_FILES['profile_pic']['tmp_name'];
        $profilePicName = $_FILES['profile_pic']['name'];
        $directory = "../../uploads/profilePic/students/";
        move_uploaded_file($profilePicTmp,$directory.$profilePicName);
    } else{
        $profilePicName = $prev_profile;
    }
    $updateProfile = $student->updateStudentProfile($connection,$name,$college,$course,$department,$year,$description,$profilePicName,$contact,$userId);
    if ($updateProfile){
        echo 'test^success';
    }
}


/*
 * get other student profile below
 */

if (isset($_POST['otherUserProfileBelow']) == "otherUserProfileBelow")
{
    $userId =  base64_decode($_POST['id']);
    $schooling1 = $student->getStudentSchoolingListByUserId($connection,$userId);
    $studentExp = $student->getStudentExperienceListByUserId($connection,$userId);

    $schoolingData1 = "";
    if ($schooling1->num_rows > 0 )
    {
        while ($row = $schooling1->fetch_object())
        {
            $schoolingData1 .='
            <div class="col-lg-12">
                <table>
                    <tr>
                        <td><img src="ownImages/student/profile/education-icon.png" width="50" height="50"></td>
                        <td>
                            <p style="vertical-align:text-top;">
                                <span class="lead">'.$row->collegeName.'</span><br/>
                                <span>'.$row->collegeAddress.'</span><br/>
                                    <span>'.$row->qualification.'</span>
                                <b>'.$row->startYear.'-'.$row->completionYear.'</b><br/>
                            </p>
                        </td>
                   
                    </tr>
                </table>
                <img src="ownImages/other/line.png" width="100%" height="1"/>
            </div>
            ';
        }
    }

    $experience1 = '';
    if ($studentExp->num_rows > 0){
        while ($row = $studentExp->fetch_object()){
            $experience1 .= '
             <div class="col-lg-12">
                <table>
                    <tr>
                        <td>
                            <img src="ownImages/student/profile/user-experience-icon.png" width="50" height="70"/>
                        </td>
                        <td>
                            <p style="vertical-align:text-top">
                                <span class="lead">'.$row->title.'</span><br/>
                                '.$row->description.'<br/>
                                <b>'.$row->position.'</b>
                            </p>
                        </td>
                      
                    </tr>
                </table>
                <img src="ownImages/other/line.png" width="100%" height="1"/>
            </div>
            ';
        }
        echo "test^".$schoolingData1."^".$experience1;
    }
}

