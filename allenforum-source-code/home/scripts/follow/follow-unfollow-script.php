<?php
include "../../../config/session_header.php";
include "../../../config/configuration.php";
include "../../functions/common/Common.php";
if (isset($_POST['q'])){
    $user_id = $_POST['user_id'];
    $userRole = $_POST['userRole'];
    /* check if the user has already following then show to follow */
    $follow = new CommonFunctions();
    $alreadyFollowing = $follow->checkFollowing($connection,$user_id,$userRole,$_SESSION['userId'],$_SESSION['userrole']);
    if ($alreadyFollowing){
        echo 'Follow'."<i class='fa fa-plus'></i>";
    } else{
        $addFollow = $follow->addFollow($connection,$user_id,$userRole,$_SESSION['userId'],$_SESSION['userrole']);
        if ($addFollow){
            echo 'Following'."<i class='fa fa-check'></i>";
        }
    }

}