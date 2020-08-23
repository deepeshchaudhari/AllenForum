<?php
include "../../../config/session_header.php";
include "../../../config/configuration.php";


if ($_POST['addBtn'] == 'active') {

    $user_id = $_POST['user_id'];
    $school_college = $_POST['school_college'];
    $starting_year = $_POST['starting_year'];
    $complete_year = $_POST['complete_year'];
    $qualification = $_POST['qualification'];
    $schooling_des = $_POST['schooling_des'];
//$branch_stream  = $_POST['branch_stream'];

    $year = $starting_year . "-" . $complete_year;

    $label = 'schooling';

    $add = " INSERT INTO forum_profile_student
  (user_id,label,title,desciption,position,year,date_time) 
  VALUES ('$user_id','$label','$school_college','$schooling_des','$qualification','$year',now()) ";

    $addResult = $connection->query($add);
    if ($addResult) {
        echo "done";
    } else {
        die("Error:" . $connection->error);
    }
}


