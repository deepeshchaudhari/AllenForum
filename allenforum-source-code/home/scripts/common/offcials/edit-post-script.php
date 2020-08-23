<?php
include "../../../../config/session_header.php";
include "../../../../config/configuration.php";
if (isset($_POST['editPostBtn'])){

    $post_id     = base64_decode($_POST['post_id']);
    $post_title  = $_POST['post_title'];
    $post_text   =  $_POST['postText'];

    $updatePost = $connection->query("UPDATE  forum_contribution_post 
     SET post_title = '$post_title',post_text = '$post_text' WHERE id = '$post_id' ")
    or die("Eror in post updation:".$connection->error);

    if ($updatePost){
        header("Location:../../../my-posts.php?action=post_update&status=success");
    } else{
        die("Something error in updation:".$connection->error);
    }

}