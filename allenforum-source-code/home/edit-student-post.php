<?php include "../config/session_header.php"; ?>

<?php
$pageTitle = "Ask Questions | Allenhouse Group of Colleges";
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
$activeTabAskQuestions = "active";
$activeTabAnsGot = "";
$activeTabAskedQuestion = "";


$activeForumTreeTab = "active";
$activeTabSavedAns = "";
$activeTabLetStart = "";


include('sidebar.php');?>
<?php
/* get the values */
if (isset($_GET['post_id']) && isset($_GET['asked_by']))
{
    $postId    = base64_decode($_GET['post_id']);
    $asked_by  = base64_decode($_GET['asked_by']);

    $findPost = $connection->query("SELECT * FROM forum_questions
    WHERE q_id = '$postId' AND 	asked_by = '$asked_by' ");

    if ($findPost->num_rows > 0){
        $postDetails = $findPost->fetch_object();
    }

}
?>

<div class="content-wrapper">
    <!--==================Ask question div=========================================================-->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <form action="scripts/student/edit-student-post-script.php" name="askquestion_form" method="post" runat="server"
                          enctype="multipart/form-data">
                        <div class="box-header">
                            <span class="fa  fa-commenting"></span>    <h3 class="box-title">Type Your Question here</h3>
                        </div>
                        <?php

                        ?>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <input type="hidden" name="postId" value="<?php echo $postId;?>">

                                        <select name="askWithWhome" class="form-control" required="required">
                                            <option value="" selected disabled>--SELECT--</option>
                                            <option value="student" >Student</option>
                                            <option value="faculty">Faculty</option>
                                            <option value="all">All</option>

                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <select name="shareWithdepartment"  class="form-control" required="required">
                                            <option value="" selected disabled>--SELECT DEPARTMENT--</option>
                                            <option value="CSE">Computer Science & Engg.</option>
                                            <option value="EN">Electrical & Electronics Engg.</option>
                                            <option value="EC">Electronics Engineering</option>
                                            <option value="ME">Mechanical Engineering</option>
                                            <option value="CE">Civil Engineerring</option>
                                            <option value="BCA">Bachelor of Computer Application</option>
                                            <option value="BBA">Bachelor of Business Administration</option>
                                            <option value="" disabled>_____________________________</option>
                                            <option value="all">All Department</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-4">
                                    <div class="form-group">
                                        <select name="shareWithYear" class="form-control" required="required">
                                            <option value="" selected disabled>--Year--</option>
                                            <option value="1">Ist Year</option>
                                            <option value="2">2nd Year</option>
                                            <option value="3">3rd Year</option>
                                            <option value="4">Final Year</option>
                                            <option value="" disabled>______________</option>
                                            <option value="all">All</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="text" name="question_title" required="required"
                                               value="<?php echo $postDetails->title;?>"
                                               placeholder="Question Title example, About Software Development"
                                               class="form-control"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body pad">
                            <textarea name="your_question"  required id="quesText"><?php echo $postDetails->question;?></textarea>
                            <script>
                                CKEDITOR.replace( 'your_question' );
                            </script>
                        </div>
                        <div class="box-footer">
                            <div class="pull-right">
                                <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
                                <button type="submit" name="editQuestionBtn" class="btn btn-primary"> Send <i class="fa fa-arrow-circle-right"></i> </button>
                            </div>
                            <div class="btn btn-default btn-file">
                                <i class="fa fa-paperclip"></i> Problem Pic
                                <input type="file" name="problem_pics"/>
                            </div>
                            <p class="help-block">100KB</p>
                        </div>
                        <!-- /.box-footer -->
                    </form>
                </div> <!--/box-->
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
