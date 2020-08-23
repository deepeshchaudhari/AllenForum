<?php
/* show the status of Question shared */
if (isset($_SESSION['shareStatus'])){ ?>
    <div class="text-center">
        <span class="badge" style="background-color: #00e765;color: white;">
            <?php echo $_SESSION['shareStatus'];?>
        </span>
    </div>
<?php } unset($_SESSION['shareStatus']);
/* Display the question asked by the student, to this faculty */
$userIn_department = $_SESSION['dept'];    // me
$userRole          = $_SESSION['userrole']; // student
$filterTheQuestions = "SELECT * FROM forum_questions 
                       WHERE (department = '$userIn_department' OR department = 'all')
                       AND (to_whome = '$userRole' OR to_whome = 'all') OR (asked_by='".$_SESSION['userId']."')
                       ORDER BY q_id DESC";
$questions = $connection->query($filterTheQuestions);
if ($questions->num_rows){
    while ($questionsRow = $questions->fetch_object()){

        $askedByRoll = $questionsRow->asked_by;
        $towhome = $questionsRow->to_whome;
        $year = $questionsRow->year;
        $dept = $questionsRow->department;
        $dateNtime = $questionsRow->q_date_time;
        /*
         * Find how many answers has been given for particular questions
         */
        $findAnsNumbers = $connection->query("SELECT * FROM forum_answers 
         WHERE  q_id = '$questionsRow->q_id' ");


        /*
         * Find the details of question i.e shared with ?, and who asked the question
         */
        $askerInfo = $connection->query("SELECT * FROM forum_users
         WHERE user_id = '$askedByRoll' ")->fetch_object() or die("Some errot".$connection->error);



        if ($dept == 'all' && $year == 'all'){
            $shared = 'Shared publicly';
        } else{
            $shared = "Shared with ".$towhome." ".strtoupper($year)." ,".strtoupper($dept);
        }
        $time   =  date('g : i A',strtotime($dateNtime));
        $date   = date('d M,Y',strtotime($dateNtime));
        ?>


        <div class="post">
            <div class="user-block">
                <img class="img-circle img-bordered-sm" src="<?php echo $_SESSION['profile'];?>" alt="user image">
                <img class="img-circle img-bordered-sm" src="ownImages/branch/<?php echo strtolower($_SESSION['dept']).".jpg" ;?>" alt="user image">
                <span class="username">
                    <a href="student-profile.php?userId=<?php echo $askedByRoll;?>"><?php echo $askerInfo->name;?></a>
                </span>
                <span class="description">
                    <?php echo $shared;?> - <?php echo $date." at ".$time;?>
                </span> <br/>
                <p class="question-title-home">
                    <?php echo $questionsRow->title;?>
                    <?php
                    /* User can have edit option for his post only */
                    if ($_SESSION['userrole'] == 'student' && $_SESSION['userId'] == $askedByRoll ){ ?>
                      <div class="student-post-edit">
                          <a href="edit-student-post.php?post_id=<?php echo base64_encode($questionsRow->q_id)."&asked_by=".base64_encode($askedByRoll);?>" title="Edit Notice">
                              <i class="glyphicon glyphicon-pencil icon fa-1x"></i>
                          </a>
                      </div>
                   <?php } ?>
                   <span><img src="../home/ownImages/other/question_icon.jpg" width="5" height="5"></span>
                    <?php if (strlen($questionsRow->question) > 200){
                       echo substr($questionsRow->question,0,200)."...";
                    } else{
                       echo  substr($questionsRow->question,0,200);
                    }?>

                </p><br/>
                <ul class="list-inline">
                    <li>
                        <a href="../home/forum-share-it.php?ques=<?php echo base64_encode($questionsRow->q_id);?>"  class="btn btn-default btn-xs">
                            Share <i class="fa fa-share"> </i></a>
                    </li>
                        <li>
                            <form action="" method="post">
                            <input type="hidden" name="q_idToLike"
                                   value="<?php echo $questionsRow->q_id;?>"/>
                            <button type="submit"   name="likeBtn" id="likeBtn" onclick="forumLike();"  class="btn btn-default btn-xs">
                                <i class="fa fa-thumbs-o-up"></i>
                                Like
                                 <span id="forum-like-value"></span>
                                <?php
                                /*
                                 * This checks whether I liked this or not
                                 * if liked it then its color will be red
                                 */
                                $checkUserLiked = $connection->query("SELECT * FROM 
                                forum_like_details WHERE q_id = '$questionsRow->q_id' AND 
                                liked_by = '".$_SESSION['userId']."' ");
                                if ($checkUserLiked->num_rows){ ?>
                                    <span class="badge" style="background-color:#ff481f">
                                    <?php
                                    /*
                                     * Fetch the like value
                                     */
                                    $likeQuery = $connection->query("SELECT total_like
                                   FROM forum_questions WHERE q_id = '$questionsRow->q_id' ");
                                    $likeValue = $likeQuery->fetch_object();
                                    if($likeValue->total_like == ''):
                                        echo "0";
                                    else:
                                        echo $likeValue->total_like;
                                    endif;
                                    ?>
                                </span>

                               <?php } else{
                                    /*
                                     * I haven't liked till now
                                     */
                                    ?>
                                    <span class="badge" style="background-color: grey">
                                    <?php
                                    /*
                                     * Fetch the like value
                                     */
                                    $likeQuery = $connection->query("SELECT total_like
                                   FROM forum_questions WHERE q_id = '$questionsRow->q_id' ");
                                    $likeValue = $likeQuery->fetch_object();
                                    if($likeValue->total_like == ''):
                                        echo "0";
                                    else:
                                        echo $likeValue->total_like;
                                    endif;
                                    ?>
                                </span>
                               <?php }
                                ?>

                            </button>
                            </form>
                        </li>

                        <li title="Comment">
                            <?php
                            /*
                             * Validate that the person can not answer,and like his own answer
                             */
                            $validateUser = $connection->query("SELECT * FROM forum_questions 
                            WHERE q_id = '$questionsRow->q_id' AND asked_by = '".$_SESSION['userId']."' ");
                            if ($validateUser->num_rows > 0){
                            ?>
                                Comments(<?php echo $findAnsNumbers->num_rows;?>)

                            <?php } else{ ?>
                                <a href="give-your-answer.php?ques_id=<?php echo base64_encode($questionsRow->q_id)."&askedby=".base64_encode($questionsRow->asked_by);?>" class="link-black text-sm"><i class="fa fa-comments-o margin-r-5"></i>
                                    Comments(<?php echo $findAnsNumbers->num_rows;?>)
                                </a>
                           <?php  }?>
                        </li>




                    <?php
                    /*
                     * validate, that whether this person given anser or not
                     * and confirmation as well, on the basis of green and yello icon
                     */
                    $validateStatus = $connection->query("SELECT * FROM forum_answers 
                     WHERE q_id = '$questionsRow->q_id' AND answered_by = '".$_SESSION['userId']."'  ");
                    if ($validateStatus->num_rows){
                        echo '<li><div class="answer-given" title="You have Given Answer to this Question"></div></li>';
                    } else{
                        echo '<li><div class="answer-pending" title="Answer not given"></div></li>';
                    }
                    ?>
                   <!--<li><a href="../home/forum-dicussion.php?timeline=active&ques_id=<?php echo $questionsRow->q_id."&asked_by=".$askedByRoll;?>"><span class="badge">Read More</span> </a> </li>-->
                   <li><a href="../home/read-more-question.php?ques_id=<?php echo base64_encode($questionsRow->q_id)."&asked_by=".base64_encode($askedByRoll);?>"><span class="badge">Read More</span> </a> </li>

                </ul>
            </div>
        </div>
        <?php
    }
}
?>


<?php
/*
 * make the like action
 */
if (isset($_POST['likeBtnStop'])){

    $likeKey = $_POST['q_idToLike']; // q_id

    /*
     * Check whether user has liked or not,
     * if he liked then, it will be disliked
     */
    $checkLiked = $connection->query("SELECT * FROM forum_like_details 
    WHERE q_id = '$likeKey' AND liked_by = '".$_SESSION['userId']."'  ");

    $latesLike = $connection->query("SELECT total_like
                FROM forum_questions WHERE  q_id = '$likeKey' ")->fetch_object()->total_like;
     // 4

    if ($checkLiked->num_rows) {
        $newLike = $latesLike - 1;
        $dislike = $connection->query("UPDATE forum_questions 
                                         SET total_like = '$newLike' WHERE q_id = '$likeKey' ");
        $dislikeDelete =  $connection->query("DELETE FROM forum_like_details 
         WHERE q_id = '$likeKey' AND  liked_by = '".$_SESSION['userId']."'  ")
        or die("not deletd".$connection->error);

    } else {
        $newLike = $latesLike + 1;

        $updateLike = $connection->query("UPDATE forum_questions 
                                         SET total_like = '$newLike' WHERE q_id = '$likeKey' ");
        /*
         * Add detail in second table
         */
        $addDetails = $connection->query("INSERT INTO forum_like_details
      (q_id,liked_by,date_time) VALUES ('" . $likeKey . "','" . $_SESSION['userId'] . "',now())  ")
        or die("failed" . $connection->error);
    }

    header("Location:../home/forum-dicussion.php?home=active");


}
?>


