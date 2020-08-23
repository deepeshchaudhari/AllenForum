<?php
include "../../config/session_header.php";
include "../../config/configuration.php";

if (isset($_POST['UnblockUsersBtn'])){
    $userId       =  base64_decode($_POST['userId']);
    $blocked_by   =  base64_decode($_POST['blocked_by']);

    $check = $connection->query("SELECT * FROM forum_users WHERE user_id = '$userId' ")
    or die("Errpr to un block the user".$connection->error);
    if ($check->num_rows > 0 ){
        $blockUser = $connection->query("UPDATE forum_users 
        SET block = '1',blocked_by = '' WHERE user_id = '$userId' ");
        header("Location:../block-users.php?action=unblocked successfully");
    }
}

if (isset($_POST['blockUsersBtn'])){

    $userId       =  base64_decode($_POST['userId']);
    $blocked_by   =  base64_decode($_POST['blocked_by']);

    $check = $connection->query("SELECT * FROM forum_users WHERE user_id = '$userId' ")
    or die("Errpr to block the user".$connection->error);
    if ($check->num_rows > 0 ){
        $blockUser = $connection->query("UPDATE forum_users 
        SET block = '0',blocked_by = '$blocked_by' WHERE user_id = '$userId' ");
        header("Location:../block-users.php?action=blocked successfully");
    }


}