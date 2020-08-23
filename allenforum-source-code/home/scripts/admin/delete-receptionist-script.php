<?php
include "../../../config/session_header.php";
include "../../../config/configuration.php";
if (isset($_GET['id'])){
    $re_id = base64_decode($_GET['id']);
    $check = $connection->query("SELECT * FROM forum_users WHERE 
    user_id = '$re_id' AND role = 'receptionist' ")
    or die("Could not found recpeitonsi".$connection->error);
    if ($check->num_rows){
        $delete = $connection->query("DELETE FROM forum_users WHERE 
       user_id = '$re_id' AND role = 'receptionist' ");
        if ($delete){
            header("Location:../../add-receptionist.php");
        } else{
            die("Somthing error in deletion".$connection->error);
        }
    } else{
        header("Location:../../404.php");
    }
}