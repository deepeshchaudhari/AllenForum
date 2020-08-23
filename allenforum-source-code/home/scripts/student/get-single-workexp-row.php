<?php

include "../../../config/session_header.php";
include "../../../config/configuration.php";

if(isset($_POST['id']))
{
    //Get User Details
    $rowID = $_POST['id']; // row id

    $record = $connection->query("SELECT * FROM forum_profile_student
    WHERE id='$rowID' AND user_id = '".$_SESSION['userId']."' AND label = 'work_exp' ");

    $response = array();

    if ($record->num_rows) {
        $data = $record->fetch_assoc();
        $response['title'] = $data['title'];
        $response['position'] = $data['position'];
        $response['description'] = $data['desciption'];

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