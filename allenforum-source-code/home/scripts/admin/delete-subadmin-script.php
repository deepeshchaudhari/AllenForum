<?php
include "../../../config/session_header.php";
include "../../../config/configuration.php";
if (isset($_GET['id'])){
    $admin_id = base64_decode($_GET['id']);
    $select = $connection->query("SELECT * FROM forum_users WHERE id = '$admin_id' AND role = 'admin' ");
    if ($select->num_rows > 0){
        $deleteAdmin = $connection->query("DELETE FROM forum_users WHERE id = '$admin_id' ")
        or die("Error in admin delete".$connection->error);
        if ($deleteAdmin){
            $_SESSION['adminDeleteStatus'] = 'Admin Deleted !';
            header("Location:../../manage-admins.php?action=delete&status=deleted successfully");
        } else{
            die("Something error in admin delete:".$connection->error);
        }
    }
}