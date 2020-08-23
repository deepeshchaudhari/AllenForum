<?php
include '../../../../config/session_header.php';
include "../../../../config/configuration.php";

if (isset($_GET['id'])){
    $post_id = base64_decode($_GET['id']);
    $findPost = $connection->query("SELECT * FROM  forum_contribution_post WHERE id = '$post_id' ")
    or die("Post not found:".$connection->error);
    if ($findPost->num_rows > 0) {
        $deletePost = $connection->query("DELETE FROM forum_contribution_post WHERE id = '$post_id' ")
        or die("Post Cant Deleted:".$connection->error);

        if ($deletePost){
            header("Location:../../../my-posts.php?status=post deleted");
        }
    }
}