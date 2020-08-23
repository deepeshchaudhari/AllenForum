<?php
include "../../../config/session_header.php";
include "../../../config/configuration.php";

if (isset($_GET['reportID']) && isset($_GET['reportedBy'])){
    $reportId = $_GET['reportID'];
    $reportedBy = $_GET['reportedBy'];
    $user = $_GET['user'];

    $query = "SELECT * FROM  forum_questions WHERE q_id='$reportId' ";
    $getUser = $connection->query("SELECT * FROM forum_student WHERE id='$user'")->fetch_object()->user_id or die("Eror in gettting user".$connection->error);
    $connection->query("UPDATE forum_users SET user_status='0',status_by='$reportedBy' WHERE id = '$getUser' ");
    if($connection->query($query)->num_rows){
        $delete = $connection->query("UPDATE  forum_questions SET status='0' WHERE q_id='$reportId' ");
        if ($delete){
           $return = "Location:../../forum-dicussion.php?home=active&opensFor=".$_SESSION['userrole']."&title=dashboard%20&%20userid=".md5($_SESSION['userId']);
           header($return);
        }
    }

}
 else{
    $url404 = "Location:../../404.php";
    header($url404);
 }
