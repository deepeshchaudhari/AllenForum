<?php
include "../../../config/session_header.php";
include "../../../config/configuration.php";
include_once "../../functions/common/Common.php";
if (isset($_POST['course_id'])){
    $course_id = $_POST['course_id'];
    $purpose = $_POST['purpose'];
    $common = new CommonFunctions();
    $result = $common->getDepartmentByCourse($connection,$course_id);
    $department = '';
    $output = '';

    while ($departments = $result->fetch_object()){
       // $department[] = $departments;
        $output .= '<option value="'.$departments->id.'">'.$departments->department_name.'</option>';
    }
    if ($purpose == "discussion"){
        $output .= '<option value="n">All</option>';
    }
   //print_r($department);
    echo $output;

}