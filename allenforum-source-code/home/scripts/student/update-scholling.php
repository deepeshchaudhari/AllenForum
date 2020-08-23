<?php
include "../../../config/session_header.php";
include "../../../config/configuration.php";

// check request
if(isset($_POST))
{
    // get values
    $id            = $_POST['id'];
    $college_name  = $_POST['college_name'];
    $qualification = $_POST['qualification'];
    $start_year    = $_POST['start_year'];
    $last_year     = $_POST['last_year'];
    $clg_des       = $_POST['clg_des'];

    $year = $start_year."-".$last_year;

    // Updaste User details
    $update = "UPDATE forum_profile_student SET 
     title = '$college_name', 
     desciption = '$clg_des', 
     position = '$qualification',
     year     = '$year' 
     WHERE id = '$id' AND user_id = '".$_SESSION['userId']."' AND label = 'schooling' ";

    if ($connection->query($update)) {
        die("Errpr in update".$db->error);
    }
}