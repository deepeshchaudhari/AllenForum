<?php
include "../../../config/session_header.php";
include "../../../config/configuration.php";

$studentId = $_SESSION['userId'];
$rowID     = $_POST['id']; // row id
$label     = 'work_exp';



     $delete = $connection->query("DELETE FROM forum_profile_student
    WHERE id = '$rowID' AND user_id = '$studentId' AND label = '$label' ");
     if ($delete){
            echo "deleted";
     } else{
            die("Error:".$connection->error);
     }
