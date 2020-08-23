<?php
$defaultImageUrl = "ownImages/other/default-chat";
$common = new CommonFunctions();
$getPosts = $common->getAllDiscussionPosts($connection,$departmentID,$_SESSION['userrole'],$_SESSION['userId']);
$courses = $common->getCourses($connection);
$departments = $common->getDepartments($connection);
?>


<div class="row">
    <div class="col-md-12">
        <ul class="timeline">
            <?php
            if ($getPosts->num_rows > 0) {
                while ($post = $getPosts->fetch_object()) {
                    $askingId = $post->asked_by;
                    $askingName = $post->asking_name;
                    $askingProfile = $post->asking_profile;
                    $discussionTitle = $post->title;
                    $discussionText = $post->question;
                    $discussionDate = date('y-m-d',strtotime($post->q_date_time));
                    $discussionId = $post->q_id;
                    $answerCount = $common->getTotalAnswerCount($connection,$discussionId);
                    ?>
                    <li>
                        <?php
                        $isAnsGiven = $common->checkAnswerGivenToThisQuestion($connection,$discussionId,$_SESSION['userId'],$_SESSION['userrole']);
                        if ($isAnsGiven->num_rows > 0){
                            $statusColor = "green";
                            $title = "You have Given Answer to this Question";
                            echo '<i class="fa fa-comments bg-'.$statusColor.'" id="statusNotAns'.$discussionId.'" title="'.$title.'"></i>';
                        } else{
                            $statusColor = "yellow";
                            $title = "Answer not Given Answer to this Question";
                            echo '<i class="fa fa-comments bg-'.$statusColor.'" id="statusNotAns'.$discussionId.'" title="'.$title.'"></i>';
                        }
                        ?>
                        <i class="fa fa-comments bg-green" id="statusAnsGiven<?php echo $discussionId;?>" title="You have Given Answer to this Question" style="display: none;"></i>

                        <div class="timeline-item" style="border: none;">
                            <span class="time"><i class="fa fa-clock-o"></i> <?php echo date('d M,Y',strtotime($discussionDate));?></span>
                            <h3 class="timeline-header" style="border: none;">
                        <span>
                            <img src="<?php if ($askingProfile){echo '../'.SPROFILE_BASEURL.$post->asking_profile; } else { echo DEFAULT_USER_PIC; }?>" class="img-circle" width="40" height="40">
                        </span>
                                <a href="student-profile.php?name=<?php echo $askingName."&user=".base64_encode($askingId);?>" target="_blank" title="Author"><?php echo $askingName;?> </a>
                                <br/><br/><span class="badge badge bg-teal"><?php echo $discussionTitle;?></span>
                            </h3>
                            <div class="timeline-body">
                              <?php echo substr($discussionText,0,200);?>
                            </div>
                            <div class="timeline-footer">
<!--                                <a class="btn btn-primary btn-xs">Read more</a>-->
                                <a href="#" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalGiveAnswer" onclick="setQuestionId('<?php echo $discussionId;?>');">
                                    <i class="fa fa-comments-o margin-r-5"></i>
                                    Answer(<span id="ansCount<?php echo $discussionId;?>"><?php if ($answerCount)echo $answerCount; else echo '0';?></span>)
                                </a>
                                <input type="hidden" name="q_idToLike"
                                       value="<?php echo $discussionId;?>"/>
                                <button type="submit" name="likeBtn" id="likeBtn"
                                        onclick="forumLike('<?php echo $discussionId;?>');"
                                        class="btn btn-default btn-xs">
                                    <i class="fa fa-thumbs-o-up"></i>
                                    Claps
                                    <?php
                                    $likeCount = $common->countLikesByQuesId($connection,$discussionId);
                                    if ($likeCount){
                                        $like = $likeCount->fetch_object()->total_like;
                                    }
                                    $liked = $common->checkIfUserAlreadyLiked($connection,$discussionId,$_SESSION['userId'],$_SESSION['userrole']);
                                    if ($liked->num_rows > 0){ ?>
                                        <span id="likedValue<?php echo $discussionId;?>" data-toggle="tooltip" title="<?php echo $like;?> Likes" class="badge bg-blue"><?php echo $like;?> </span>
                                    <?php } else{ ?>
                                        <span id="likeValue<?php echo $discussionId;?>" data-toggle="tooltip" title="<?php echo $like;?> Likes" class="badge bg-red"><?php echo $like;?> </span>
                                    <?php }
                                    ?>
                                    <span style="display: none;" id="likedValue<?php echo $discussionId;?>" data-toggle="tooltip" title="<?php echo $like;?> Likes" class="badge bg-blue"><?php echo $like;?> </span>
                                    <span style="display: none;" id="likeValue<?php echo $discussionId;?>" data-toggle="tooltip" title="<?php echo $like;?> Likes" class="badge bg-red"><?php echo $like;?> </span>

                                </button>
                                <a href="#" class="btn btn-default btn-xs" data-toggle="modal" data-target="#modalShareQues"  class="btn btn-default btn-xs" onclick="getQuestion('<?php echo $discussionId;?>');">
                                    Share <i class="fa fa-share"> </i></a>
                                     <i id="sharedTick<?php echo $discussionId;?>" class="fa fa-check" style="color:#00d200; display:<?php if ($post->share_status > 0) echo 'inline-block'; else echo 'none';?>" title="You Shared this Question"></i>

                                <a href="../home/read-more-question.php?ques_id=<?php echo base64_encode($discussionId)."&asked_by=".base64_encode($askingId);?>" class="btn btn-default btn-xs">Read more  <i class="fa   fa-angle-double-right"></i></a>
                                <?php if ($_SESSION['userrole'] == "faculty") { ?>
                                <span class="" onclick="reportAsSpam('<?php echo $discussionId;?>','<?php echo $_SESSION['userId'];?>','<?php echo $askingId;?>',event);"><a href="#"><i class="glyphicon glyphicon-hand-up" id="reportAsSpamLink" style="color:red;" data-toggle="tooltip" data-original-title="Report As Spam"></i></a></span>
                                <?php } ?>
                            </div>
                        </div>
                    </li>
                <?php }
            }
            ?>
            <!--floating button-->
            <?php if ($_SESSION['userrole'] == 'student') { ?>
                <a href="#" data-toggle="modal" data-target="#postDiscussion" class="float">
                    <i class="fa fa-plus my-float"></i>
                </a>
            <?php } ?>
        </ul>
    </div>
</div>

<?php @include "modals/student/post-discussion.php";?>
<?php @include "modals/student/modal-share-it.php";?>
<?php @include "modals/common/modal-give-answer.php";?>
<?php @include "modals/common/modal-save-answers.php";?>
<script type="text/javascript">
    function reportAsSpam(reportId,reportedBy,user,event) {
        event.preventDefault();
        if (confirm("Are You sure to report it as spam,doing this the user of this post will be blocked !")){
            window.location.href = "scripts/faculty/report-as-spam.php?reportID="+reportId+"&reportedBy="+reportedBy+"&user="+user;
        }
    }

</script>
