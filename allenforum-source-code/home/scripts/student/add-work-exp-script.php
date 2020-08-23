<?php
include "../../../config/session_header.php";
include "../../../config/configuration.php";

$user_id = $_POST['user_id']; // sent by session

$title       = $_POST['title'];
$position    = $_POST['position'];
$description = $_POST['description'];

$label = 'work_exp';

$addExp = $connection->query("INSERT INTO forum_profile_student
 (user_id,label,title,desciption,position,date_time) 
 VALUES ('".$user_id."','".$label."','".$title."','".$description."','".$position."',now())
")  or die("Error in adding".$connection->error);

if ($addExp){
    echo '1';
} else{
    echo '0';
}

