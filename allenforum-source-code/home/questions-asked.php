<?php include "../config/session_header.php"; ?>
<?php
$pageTitle = "Questions Asked  | Allenhouse Group of Colleges";
// $pageFor = "librarian";
include('header.php');?>

<?php  $activeTabDash = "";
$activeLinkDash = "";
$activeTabBook = "";
$activeLinkAddBook = "";
$activeTabViewDelete = "";
$activeLinkAddBookViewDelete = "";
$activeLinkUpdateBookStatus = "";

$activeTabManageStudents  = "";
$activeTabManageStudentsAdd = "";
$activeTabManageStudentsRemove = "";

$activeTabManageFaculty = "";
$activeTabManageFacultyAdd  = "";
$activeTabManageFacultyRemove = "";

$activeTabQuestions = "active";
$activeTabAskQuestions = "";
$activeTabAnsGot = "";
$activeTabAskedQuestion = "active";




include('sidebar.php');?>

<!-- Content Wrapper. Contains page content (body)-->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <script type="text/javascript">
        function ShowLoading(e) {
            var div = document.createElement('div');
            var img = document.createElement('img');
            img.src = 'ownImages/library/loading1.gif';
            div.innerHTML = "Processing...<br />";
            div.style.cssText = 'position: fixed; top: 15%; left: 40%; z-index: 5000; width: 422px; text-align: center; ';
            div.appendChild(img);
            document.body.appendChild(div);
            return true;
            // These 2 lines cancel form submission, so only use if needed.
            //window.event.cancelBubble = true;
            //e.stopPropagation();
        }
    </script>
    <!--==================Asked question div=========================================================-->
    <section class="content">
        <div class="row">
            <div class="col-md-12">

                <div class="box box-primary">
                    <div class="box-header with-border">
                        <h3 class="box-title">Asked Questions </h3>
                        <img src="ownImages/other/line.png" width="100%" height="1"/>

                        <div class="box-tools pull-right">
                            <div class="has-feedback">
                                <input type="text" class="form-control input-sm" placeholder="Search Mail">
                                <span class="glyphicon glyphicon-search form-control-feedback"></span>
                            </div>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body no-padding">
                        <div class="mailbox-controls">
                            <!-- Check all button -->

                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                            </div>
                            <!-- /.btn-group -->
                            <button type="button" class="btn btn-default btn-sm">
                                <a href="questions-asked.php?action=question_asked&page=refresh">
                                    <i class="fa fa-refresh">
                                    </i>
                                </a>
                            </button>
                            <div class="pull-right">
                                1-50/200
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                                </div>
                                <!-- /.btn-group -->
                            </div>
                            <!-- /.pull-right -->
                        </div>
                        <!--==============questions to display====================-->
                        <?php
                        $questions = mysql_query("SELECT * FROM forum_questions
                         WHERE asked_by = '".$_SESSION['userId']."' order by q_id DESC ")
                        or die("questions not found".mysql_error());
                        if (mysql_num_rows($questions) > 0){
                        ?>
                        <div class="table-responsive mailbox-messages">
                            <table class="table table-hover table-striped">
                                <thead>
                                  <tr>
                                      <th>Select</th>
                                      <th>Sr.No</th>
                                      <th>Title</th>
                                      <th>Question</th>
                                      <th>Whome</th>
                                      <th>Ans.Status</th>
                                      <th>Time</th>
                                  </tr>
                                </thead>
                                <tbody>
                                <?php
                                $sr  = 1;
                                while ($myQuestions = mysql_fetch_array($questions)) {
                                    /*
                                     * Now also validate, this question is answered by some or not.
                                     * if no, this title can not be a link and will not be redireced to any page.
                                     * but if yes.. then it will go the page containg answers of it
                                     */
                                    $qId = $myQuestions['q_id'];
                                    /*
                                     * now check this id of question exist in ans_table or not.
                                     */
                                    $isAnswer = mysql_query("SELECT * FROM forum_answers WHERE q_id = '$qId' ")
                                    or die("some error ocuured and not found".mysql_error());
                                    /*
                                     * this is written to fins the details of answer
                                     * like ans Id, person who gave answer,etc
                                     */
                                    $isAnswerInfo = mysql_fetch_array($isAnswer);
                                    ?>
                                    <tr>
                                        <td><input type="checkbox"></td>
                                        <td><?php echo $sr;?></td>
                                        <td class="mailbox-name">
                                            <?php
                                            if (mysql_num_rows($isAnswer)){?>
                                            <a href="answersis.php?question_id=<?php echo base64_encode($isAnswerInfo['q_id'])."&answered_by=".base64_encode($isAnswerInfo['answered_by']);?>" >
                                                <?php echo $myQuestions['title'];?>
                                            </a>
                                            <?php } else{ ?>
                                                <?php echo $myQuestions['title'];?>
                                           <?php } ?>
                                        </td>
                                        <td class="mailbox-subject">
                                            <b><?php echo $myQuestions['title'];?></b>
                                           | <?php echo $myQuestions['question'];?>
                                        </td>
                                        <?php
                                        /*
                                         * Find the name of the person given the answer.
                                         * for this, we have ID of that person
                                         * so find the name
                                         */
                                        $answerGiverQuery = mysql_query("SELECT * FROM forum_users WHERE user_id = '".$isAnswerInfo['answered_by']."' ")
                                        or die("some errro".mysql_error());
                                        $answerGiverInfo = mysql_fetch_array($answerGiverQuery);
                                        ?>
                                        <td>
                                            <a href="#">
                                                <?php echo $answerGiverInfo['name'] ;?>
                                            </a>
                                        </td>
                                        <td>
                                            <?php
                                            /*
                                             * so the current status of answers by green and yello icons
                                             */
                                            if (mysql_num_rows($isAnswer)){
                                               echo '<div class="answer-given"></div>';
                                            } else{
                                                echo '<div class="answer-pending"></div>';
                                            }
                                            ?>

                                        </td>
                                        <td class="mailbox-date">5 mins ago</td>
                                    </tr>
                               <?php $sr++; } ?>

                                </tbody>
                            </table>
                            <!-- /.table -->
                        </div>
                        <?php } else{ ?>
                            <span class="badge center-block">
                                <?php echo "You have'nt asked any question !";?>
                            </span>
                       <?php }?>
                        <!--==============//questions to display====================-->
                    </div>
                    <!-- /.box-body -->
                    <div class="box-footer no-padding">
                        <div class="mailbox-controls">
                            <div class="btn-group">
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                            </div>
                            <!-- /.btn-group -->
                            <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                            <div class="pull-right">
                                1-50/200
                                <div class="btn-group">
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                                </div>
                                <!-- /.btn-group -->
                            </div>
                            <!-- /.pull-right -->
                        </div>
                    </div>
                </div>
                <!-- /. box -->

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    <!--==================//Ask question div=========================================================-->





</div>
<!-- /.content-wrapper -->

<?php include('footer.php');?>
 