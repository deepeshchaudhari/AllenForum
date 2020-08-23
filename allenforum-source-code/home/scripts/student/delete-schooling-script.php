<?php
include "../../../config/session_header.php";
include "../../../config/configuration.php";
if (isset($_POST['id'])){

    $user_id  = $_SESSION['userId'];
    $row_id  = $_POST['id'];
    $label = 'schooling';

        $delete = $connection->query("DELETE FROM forum_profile_student
          WHERE  id = '$row_id' AND user_id = '$user_id' AND label = '$label'  ");
        if ($delete){
            echo "deleted";
        } else{
            echo "error !";
        }


}