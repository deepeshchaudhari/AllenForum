<?php include "../config/session_header.php"; ?>
<?php
$pageTitle = "Read More Questions  | Allenhouse Group of Colleges";
include('header.php');
$activeTabDash = "active";
$activeLinkDash = "active";
include('sidebar.php');
include_once "functions/common/Common.php";
include_once "functions/student/Students.php";
$common = new CommonFunctions();
?>

<!-- Content Wrapper. Contains page content (body)-->
<div class="content-wrapper">
    <?php
    /*
     * Find the question ID  and Asker of the question
     * and display theire Answers to this page
     */
    if (isset($_GET['asked_by']) && isset($_GET['ques_id'])) {
        $question_id       = base64_decode($_GET['ques_id']);
        $question_asked_by = base64_decode($_GET['asked_by']); // it is the id
        $getQuestion = "SELECT fq.*,fs.student_profile as askingProfile,fs.student_name as askingName FROM forum_questions fq LEFT JOIN forum_student fs ON fq.asked_by=fs.id WHERE q_id = '$question_id' ";
        $question = $connection->query($getQuestion);
        if ($question->num_rows) {
            $question_row = $question->fetch_object();
            $questionTitle = $question_row->title;
            $questionis = $question_row->question;
            $questionScreenshot = $question_row->screen_shot;
            $withWhome =  $question_row->to_whome;
            $withWhichDep = $question_row->department;
            $withWhichYear = $question_row->year;
            $dateNtime = $question_row->q_date_time;
            $askingProfile = $question_row->askingProfile;
            $askingName =$question_row->askingName;
            $questionShareStatus = $question_row->share_status;
            if ($withWhichDep == 'all' && $withWhichYear == 'all' && $withWhome = 'all' ){
                $shared = 'Shared publicly';
            } else{
                $shared = "Shared with ".strtoupper($withWhichYear)." ,".strtoupper($withWhichDep);
            }
            $time   =  date('g : i A',strtotime($dateNtime));
            $date   = date('d M,Y',strtotime($dateNtime));
        }

        $list_of_answers = $connection->query("SELECT * FROM forum_answers WHERE q_id = '$question_id' ORDER BY id  ");
        $howManyAnswers = $list_of_answers->num_rows;
    }
    else {
        header("Location:404.php");
    }
    ?>

    <section class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-widget widget-user">
                <div class="box-footer">
                    <div class="post">
                        <div class="user-block">
                            <img class="img-circle img-bordered-sm" src="<?php if ($askingProfile){ echo '../'.SPROFILE_BASEURL.$askingProfile;} else echo 'ownImages/other/user.png'; ?> " alt="user image">
                            <span class="username">
                        <a href="#"><?php echo $askingName;?></a></span>
                        <span class="description">
                        <?php echo $shared." "."- ".$date." at ".$time;?>
                               </span> <br/>
                            <div style="font-size: 17px;font-family: 'Sitka Subheading'"><b><?php echo $questionTitle;?></b></div>
                            <div style="font-size: 17px;font-family: 'Sitka Subheading'"><?php echo $questionis;?></div>
                        <ul class="list-inline">
                            <li>
                                <a href="#" data-toggle="modal" data-target="#modalShareQues"  class="btn btn-default btn-xs" onclick="getQuestion('<?php echo $question_id;?>');">
                                    Share <i class="fa fa-share"> </i></a>
                            </li>
                            <li>
                               <form action="" method="post">
                                   <button type="submit" name="likeBtn" value="<?php echo $question_id;?>" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i>Clap
                                       <?php
                                       /* count total likes */
                                   $liked = $connection->query("SELECT total_like from 
                                     forum_questions WHERE q_id = '$question_id' ")->fetch_object()->total_like;
                                       /* Whether I liked or not */
                                       $checkILikedThis = $connection->query("SELECT * FROM  forum_like_details
                                    WHERE q_id = '$question_id' AND liked_by = '".$_SESSION['userId']."' ");
                                       if ($checkILikedThis->num_rows > 0){ ?>
                                            <span class="badge" style="background-color:#e93917">
                                                  <?php echo $liked;?>
                                             </span>
                                      <?php } else{
                                           /* show total likes but this is not liked by me*/ ?>
                                           <span class="badge" style="background-color:#62e9b7">
                                           <?php  if ($liked) echo $liked; else echo '0';?>
                                       </span>
                                    <?php }
                                       ?>
                                     </button>
                                   </form>
                            </li>
                            <?php
                            $askedByRole = 'student';
                            $status = $common->getFollowStatus($connection,$question_asked_by,$askedByRole,$_SESSION['userId'],$_SESSION['userrole']);
                            if ($status){
                            ?>
                            <li>
                                <button type="submit" name="followBtn<?php echo $question_asked_by;?>"
                                        onclick="follow_unfollow('<?php echo $question_asked_by;?>','<?php echo $askedByRole;?>')"
                                        class="btn btn-default btn-xs">
                                    <span id="follow<?php echo $question_asked_by.$askedByRole;?>">Following <i class="fa fa-check"></i> </span>
                                </button>
                            </li>
                            <?php
                            } else{ ?>
                                <li>
                                    <button type="submit" name="followBtn<?php echo $question_asked_by;?>"
                                            onclick="follow_unfollow('<?php echo $question_asked_by;?>','<?php echo $askedByRole;?>')"
                                            class="btn btn-default btn-xs">
                                        <span id="follow<?php echo $question_asked_by.$askedByRole;?>">Follow <i class="fa fa-plus"></i> </span>
                                    </button>
                                </li>
                            <?php }  ?>

                                <li> <?php echo $howManyAnswers;?> Answers</li>
                                    <li>
                                        <a href="#" data-toggle="modal" data-target="#modalGiveAnswer" onclick="setQuestionId('<?php echo $question_id?>');">
                                            <button type="button" class="btn btn-default btn-xs" >
                                                <i class="fa fa-comments"></i>
                                                Answer It
                                            </button>
                                        </a>
                                    </li>

                            <?php
                            if($questionShareStatus > 0){ ?>
                                <span id="sharedTick<?php echo $question_id?>">
                                     <i class="fa fa-check" style="color:#00d200;" title="You Shared this Question"></i>
                                 </span>
                            <?php  }
                            ?>
                            <span id="sharedTick<?php echo $question_id?>" style="display: none;">
                                 <i class="fa fa-check" style="color:#00d200;" title="You Shared this Question"></i>
                             </span>
                            </ul> <hr/>
                        </div>
                           <div class="table-responsive">
                               <?php
                               if ($questionScreenshot){ ?>
                                   <a href="<?php echo '../'.PROBLEM_PIC_BASEURL.$questionScreenshot;?>"> <img src="<?php echo '../'.PROBLEM_PIC_BASEURL.$questionScreenshot;?>"></a>
                                   <?php echo "<br/><br/>";
                               } ?>
                           </div>
                            <?php
                            $sr = 1;
                            while ($answers_given_row = $list_of_answers->fetch_object()) {
                                $answerGiverId = $answers_given_row->answered_by;
                                $answerGiverRole = $answers_given_row->anweredByRole;
                                if ($answerGiverRole == "student"){
                                    $queryAnswers="SELECT fa.*,fs.student_name AS answerGiverName,fs.student_profile AS answerGiverProfile FROM forum_answers fa LEFT JOIN forum_student fs
                                    on fa.answered_by=fs.id WHERE fa.anweredByRole='student' AND fa.answered_by='$answerGiverId'";

                                } else if ($answerGiverRole == "faculty"){
                                    $queryAnswers = "SELECT fa.*,ff.name AS answerGiverName,ff.profile AS answerGiverProfile FROM forum_answers fa LEFT JOIN forum_faculty ff 
                                  on fa.answered_by=ff.id WHERE fa.anweredByRole='faculty' AND fa.answered_by='$answerGiverId'";
                                }
                                $answerQueryResult = $connection->query($queryAnswers);
                                if ($answerQueryResult->num_rows > 0) {
                                    $answersGiver = $answerQueryResult->fetch_object();
                                    $answersGiverProfile = $answersGiver->answerGiverProfile;
                                    ?>
                                    <div class="user-block">
                                        <img class="img-circle img-bordered-sm" src="<?php  if ($answersGiverProfile){ if ($answerGiverRole == "student" ) {   echo '../'.SPROFILE_BASEURL.$answersGiverProfile;} else if ($answerGiverRole == "faculty" ){ echo '../'.FPROFILE_BASEURL.$answersGiverProfile;} } else { echo DEFAULT_USER_PIC;} ?> " alt="user image">
                                        <span class="username"> <a href="#"><?php echo $answersGiver->answerGiverName; ?></a></span>
                                        <span class="description"><?php echo $date; ?> at <?php echo $time; ?></span>
                                        <?php echo "<div class='forum-answer'>$answers_given_row->answer</div>"; ?>
                                        <br/>
                                        <ul class="list-inline">
                                            <?php
                                            /* check user already rated it ?? */
                                            $rated = $common->checkRatedByUserIdAndQuesId($connection, $answers_given_row->id, $_SESSION['userId'], $_SESSION['userrole']);
                                            if ($rated) { ?>
                                                <li>
                                                    <button disabled class="btn btn-default btn-xs"title="You have Already Rated It !"><i class="fa fa-check" style="color: #ffaf2d;font-size: 15px;"></i> Rated</button>
                                                </li>
                                            <?php } else { ?>
                                                <li id="rateThisAnser<?php echo $answers_given_row->id; ?>">
                                                    <a href="#" data-toggle="modal" data-target="#answerRatingModal" onclick="setAnswerIDToRate('<?php echo $answers_given_row->id; ?>');" class="btn btn-default btn-xs">
                                                        <i class="fa fa-star" style="color: #ffaf2d;font-size: 15px;"></i><span id="rating<?php echo $answers_given_row->id; ?>"> Rating</span>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                            <?php

                                            $status = $common->getFollowStatus($connection, $answersGiver->answered_by, $answerGiverRole, $_SESSION['userId'], $_SESSION['userrole']);
                                            if ($status) { ?>
                                                <li>
                                                    <button type="submit" id="followBtn<?php echo $sr; ?>" onclick="follow_unfollow('<?php echo $answersGiver->answered_by; ?>','<?php echo $answerGiverRole; ?>')" class="btn btn-default btn-xs">
                                                    <span id="follow<?php echo $answersGiver->answered_by . $answerGiverRole; ?>">Following <i class="fa fa-check"></i> </span></button>
                                                </li>
                                            <?php } else { ?>
                                                <li>
                                                    <button type="submit" id="followBtn<?php echo $sr; ?>" onclick="follow_unfollow('<?php echo $answersGiver->answered_by; ?>','<?php echo $answerGiverRole; ?>')" class="btn btn-default btn-xs">
                                                    <span id="follow<?php echo $answersGiver->answered_by . $answerGiverRole; ?>">Follow <i  class="fa fa-plus"></i> </span></button>
                                                </li>
                                            <?php }
                                            ?>
                                        </ul>
                                    </div>
                                          <?php
                                       }
                                    ?>
                                <img src="ownImages/other/line.png" width="100%" height="1"/>
                                <?php $sr++;
                            };?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php @include ('modals/common/modal-answer-rating.php');?>
<?php @include ('modals/student/modal-share-it.php');?>
<?php @include "modals/common/modal-give-answer.php";?>

<?php include('footer.php');?>


<?php

if (isset($_POST['likeBtn'])){

    $likeKey = $_POST['likeBtn']; // q_id

    /*
     * Check whether user has liked it?,
     * if he liked then, it will be disliked means the else condition
     */
    $checkLiked = $connection->query("SELECT * FROM forum_like_details 
    WHERE q_id = '$likeKey' AND liked_by = '".$_SESSION['userId']."' AND usertype='".$_SESSION['userrole']."'  ");
    $latesLike = $connection->query("SELECT total_like
                FROM forum_questions WHERE  q_id = '$likeKey' ")->fetch_object()->total_like;

    if ($checkLiked->num_rows) {

        $dislikedValue = $latesLike - 1;
        $connection->query("UPDATE forum_questions 
                                         SET total_like = '$dislikedValue' WHERE q_id = '$likeKey' ")
        or die('could not updated the minsued value'.$connection->error);
        $dislikeDelete =  $connection->query("DELETE FROM forum_like_details 
         WHERE q_id = '$likeKey' AND  liked_by = '".$_SESSION['userId']."' AND usertype='".$_SESSION['userrole']."'  ")
         or die("not deletd".$connection->error);

    } else{
       $newLikedValue = $latesLike + 1;
       $connection->query("INSERT INTO forum_like_details(q_id,liked_by,usertype,date_time) 
      VALUES ( '".$likeKey."','".$_SESSION['userId']."','".$_SESSION['userrole']."',now() )  ")
       or die('error in liking'.$connection->error);

        $connection->query("UPDATE forum_questions 
                                         SET total_like = '$newLikedValue' WHERE q_id = '$likeKey' ")
        or die('could not updated the Plused value'.$connection->error);
    }

    $url = "Location:read-more-question.php?ques_id=".base64_encode($likeKey)."&asked_by=".base64_encode($question_asked_by);

    header($url);

}
?>
