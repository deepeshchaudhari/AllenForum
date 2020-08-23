<?php
if (isset($_POST['followSingleBtn'])){
    $var = 'Follow';
    $followTo = $_POST['followTo'];
    /* valdate whether you are already following this user
    then you have to unfollow it , if you clicked the same button twice */
    $alreadyFollowed = $connection->query("SELECT * FROM forum_follow WHERE
                                                following = '$followTo' AND user_id = '".$_SESSION['userId']."' ")
    or die("someting error in validating".$connection->error);

    if ($alreadyFollowed->num_rows > 0 ){
        /* remove the record means unfollow this */
        $connection->query("DELETE FROM forum_follow  WHERE
                                                following = '$followTo' AND user_id = '".$_SESSION['userId']."' ")
        or die('error in unfollowing'.$connection->error);
    }  else {

        $connection->query("INSERT INTO forum_follow (user_id,following,value) VALUES ('" . $_SESSION['userId'] . "','" . $followTo . "','" . $var . "') ")
        or die("Error in follow" . $connection->error);
    }
    $afterFollowurl = "Location:read-more-question.php?ques_id=".base64_encode($question_id)."&asked_by=".base64_encode($question_asked_by);
    header($afterFollowurl);

}
?>

<?php
$alreadyFollowed = $connection->query("SELECT * FROM forum_follow WHERE
                                                        following = '$question_asked_by' AND user_id = '".$_SESSION['userId']."' ")
or die("someting error in validating".$connection->error);

if ($alreadyFollowed->num_rows > 0 ){

    $followVar = 'Following';
}  else {
    $followVar = 'Follow';
}

?>