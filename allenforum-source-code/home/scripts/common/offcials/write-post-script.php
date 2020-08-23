<?php
include "../../../../config/session_header.php";
include "../../../../config/configuration.php";

if (isset($_POST['writePostBtn'])){

    $postText = $_POST['postText'];
    $post_title = $_POST['post_title'];
    $departmemt = $_POST['departmemt'];
    $posted_by = $_SESSION['userId'];
    $userRole = $_SESSION['userrole'];
     $date = date('Y-m-d H:i:s');

    $addPost = " INSERT INTO  forum_contribution_post(post_title,post_text,posted_by,posted_for,postedByUserType,posted_on) 
    VALUES ('".$post_title."','".$postText."','".$posted_by."','".$departmemt."','$userRole', '".$date."')  ";
    $addPostResult = $connection->query($addPost);

    if ($addPostResult){
        header("Location:../../../my-posts.php");
    } else{
        die("Something errrro in post adding".$connection->error);
    }
}