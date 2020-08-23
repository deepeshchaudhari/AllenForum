<?php include "../config/session_header.php"; ?>
<?php
$pageTitle = "Questions Asked  | Allenhouse Group of Colleges";
include('header.php');?>

<?php  $activeTabDash = "";
$activeLinkDash = "";
?>

<?php include('sidebar.php');?>

<?php
/*
 * Get the Question Id from the URL
 */
 if ($_GET['ques_id'] && $_GET['q_type'] == 'shared'){

    $quesShared = $connection->query("SELECT * FROM forum_questions WHERE q_id = '".base64_decode($_GET['ques_id'])."' ");
    if ($quesShared->num_rows){
        $quesIs = $quesShared->fetch_object()->question;
    }
     $titleQues = base64_decode($_GET['title']);
} else if (isset($_GET['ques_id']) && isset($_GET['ansId'])){
     $question_id = base64_decode($_GET['ques_id']);
     $answerID  = base64_decode($_GET['ansId']);
     $titleQues = "";
     $query = "SELECT fa.*,fq.question as savedQuestion FROM forum_answers fa left join forum_questions fq on fa.q_id=fq.q_id
    WHERE fa.q_id = '$question_id' and fa.id='$answerID'    ";
    // echo $query;
     $findAnswer = $connection->query($query);
     if ($findAnswer->num_rows){
         $detailsQues = $findAnswer->fetch_object();
         $quesSaved = $detailsQues->savedQuestion;
         $answeris = $detailsQues->answer;
     } else{
         $answeris = 'N/A';
     }
 }
?>

<div class="content-wrapper">
    <section class="content">
        <div  class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <div class="tab-content">
                        <div class="box-header">
                            <i class="glyphicon glyphicon-saved"></i>
                            <h3 class="box-title"><?php if (isset($answeris)) echo 'Saved Answer is:'; else echo 'Shared Question is:'?></h3>
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                   <span>
                                       <img src="ownImages/other/gif_processing.gif" width="30" height="30">
                                   </span>
                            </div>
                        </div> <hr/>
                        <?php if ($titleQues) echo '<h3>'.$titleQues.':</h3>'; else if ($quesSaved) echo '<h3>'.$quesSaved.'</h3>' ;?>
                        <?php if(isset($answeris)) echo $answeris; else echo $quesIs;?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->

<?php include('footer.php');?>




