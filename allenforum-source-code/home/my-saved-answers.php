<?php include "../config/session_header.php"; ?>
<?php include_once "functions/common/Common.php";?>
<?php
$pageTitle = "Saved Answers  | Allenhouse Group of Colleges";
include('header.php');
$activeTabDash = "";
$activeLinkDash = "";
include('sidebar.php');
$common = new CommonFunctions();
?>

<div class="content-wrapper">
    <section class="content">
        <div  class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <div class="tab-content">
                        <div class="box-header">
                            <i class="glyphicon glyphicon-saved"></i>
                            <h3 class="box-title">Saved Answers</h3>
                            <div class="pull-right box-tools">
                               <span><img src="ownImages/other/gif_processing.gif" width="30" height="30"></span>
                            </div>
                        </div><hr/>
                        <div class="table-responsive">
                            <table class="table table-stripped" id="savedAnswersTable">
                                <thead>
                                  <tr>
                                      <th>Sr.</th>
                                      <th>Question Title</th>
                                      <th>Answer</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sr = 1;
                                $savedAnswers = $common->getSavedAnswersByUserId($connection,$_SESSION['userId'],$_SESSION['userrole']);
                                if ($savedAnswers->num_rows > 0)
                                {
                                    while ($savedQuestionRow = $savedAnswers->fetch_object())
                                    {
                                        ?>
                                        <tr>
                                            <td><?php echo $sr; ?></td>
                                            <td style="text-align: start;">
                                                <a href="my-saved-answer-is.php?ques_id=<?php echo base64_encode($savedQuestionRow->q_id). "&ansId=".base64_encode($savedQuestionRow->ansId)."&q_type=saved&page=" . md5('my-saved-answer'); ?>">
                                                    <?php echo strtoupper($savedQuestionRow->questionTitle); ?>
                                                </a>
                                            </td>
                                            <td style="text-align: start;"><p><?php echo $savedQuestionRow->savedAnswer ;?></p></td>
                                        </tr>
                                        <?php
                                        $sr++;
                                    }
                                }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include('footer.php');?>




