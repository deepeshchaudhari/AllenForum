<?php
include "../../../config/session_header.php";
include "../../../config/configuration.php";
include_once "../../functions/student/Students.php";


    $name = $_POST['student_name'];
    $college = $_POST['college_name'];
    $course = explode('^',$_POST['course_program']); // 0 -> ^,1->B.Tech
    $department = $_POST['department_branch'];
    $state = $_POST['state'];
    $year = $_POST['year'];
    $city = $_POST['city'];
    $description = $_POST['description'];
    $profile_pic_tmp = $_FILES['profile_pic']['tmp_name'];
    $profile_pic_name = $_FILES['profile_pic']['name'];
    $prev_profile = $_POST['prev_profile'];
    $userId = $_SESSION['userId'];

    $student = new Students();
    $update = $student->updateStudentProfile($connection,$userId,$name,$college,$course[1],$department,$year,$state,$city,$description,$profile_pic_tmp,$profile_pic_name,$prev_profile);
    if ($update){
        echo 'ok';
    } else{
        echo 'fail';
    }


?>


