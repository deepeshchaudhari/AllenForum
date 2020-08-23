<?php
include '../../../../config/session_header.php';
include "../../../../config/configuration.php";

if (isset($_POST['shareQuesBtn'])){
    $q_id = $_POST['q_id'];
 // $count =  count($_POST['checkUsersToShare']);
 // echo $q_id; echo "<br/>";
  foreach ($_POST['checkUsersToShare'] as $usersSelected){

      $query = " INSERT INTO forum_ques_share(q_id,shared_with,shared_by,shared_time)
       VALUES ( '".$q_id."','".$usersSelected."','".$_SESSION['userId']."',now() )";

      $run = $connection->query($query);
  }
  $_SESSION['shareStatus'] = 'You have Shared ! ' ;
  header("Location:../../../forum-dicussion.php?home=active");

}