<?php

include "../../../config/session_header.php";
include "../../../config/configuration.php";

if(isset($_POST['id']))
{
    //Get User Details
    $user_id = $_POST['id']; // row id

    $record = $connection->query("SELECT * FROM forum_profile_student
    WHERE id='$user_id' AND user_id = '".$_SESSION['userId']."' AND label = 'schooling' ");
    $startyear = array();
    $response = array();
    if ($record->num_rows) {
        $data = $record->fetch_assoc();
       /* $year = $data['year'];
        $startYear['start'] = substr($year,0,4);
        $lastYear['last']   = substr($year,5,8);*/

        $response = $data;
    }
    echo json_encode($response);
    //echo json_encode($startYear);
    //echo json_encode($lastYear);

}
else
{
    $response['status'] = 200;
    $response['message'] = "Invalid Request!";
}