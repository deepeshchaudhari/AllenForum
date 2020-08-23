<?php
include "../../../config/session_header.php";
include "../../../config/configuration.php";

    $rowId     = $_POST['id']; //row id
    $new_title       = $_POST['title'];
    $new_position    = $_POST['position'];
    $new_description = $_POST['description'];
    $user_id   = $_SESSION['userId']; // user session id

    $label = 'work_exp';

        $update = "UPDATE forum_profile_student SET title  = '".$new_title."',desciption = '".$new_description."',position = '".$new_position."',date_time=now()
        WHERE id = '".$rowId."' AND user_id = '".$user_id."' AND  label = '".$label."' ";
        $updateResult = $connection->query($update);
        if ($updateResult){
          echo 'updated';
        }
?>


