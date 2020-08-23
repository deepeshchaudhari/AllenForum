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

$activeTabQuestions = "";
$activeTabAskQuestions = "";
$activeTabAnsGot = "";
$activeTabAskedQuestion = "";

$facultyForumTreeTab = "active";
$facultyLetsAnsTab = "";




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
        <!--==================Give question div=========================================================-->
        <section class="content">
            <div class="row">
                <div class="col-md-12">

                    <div class="box box-warning">
                        <!-- /.box-header -->
                        <div class="box-body no-padding">
                                <div class="box-header">
                                    <i class="glyphicon glyphicon-pencil"></i>
                                    <h3 class="box-title">Write Your Answer</h3>
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                   <span>
                                       <img src="ownImages/other/gif_processing.gif" width="30" height="30">
                                   </span>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <table class="table">
                                        <tr>
                                            <td>
                                                <p class="lead">
                                                    <span class="badge">Question:</span>
                                                    <?php echo "dummy ";?>
                                                </p>
                                            </td>
                                            <td>
                                                <img src="ownImages/other/veritical-line-separator.png" width="1" height="50">
                                            </td>
                                            <td>
                                                <img src="ownImages/student/profile/student.png" width="50" height="50" class="img-circle">
                                            </td>
                                            <td> <span class="badge">Asked by :</span> Ankit kumar,CSE</td>

                                        </tr>
                                    </table>
                                    <img src="ownImages/other/line.png" width="100%" height="1"/>
                                </div>
                                <div class="box-header with-border">
                                    <h3 class="box-title">Direct Chat</h3>
                                    <div class="box-tools pull-right">
                                        <span data-toggle="tooltip" title="3 New Messages" class="badge bg-light-blue">3</span>
                                        <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Contacts" data-widget="chat-pane-toggle">
                                            <i class="fa fa-comments"></i></button>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <!-- Conversations are loaded here -->
                                    <div class="direct-chat-messages">

                                        <!-- Message. Default to the left -->
                                        <div class="direct-chat-msg">
                                            <div class="direct-chat-info clearfix">
                                                <span class="direct-chat-name pull-left">Alexander Pierce</span>
                                                <span class="direct-chat-timestamp pull-right">23 Jan 2:00 pm</span>
                                            </div>
                                            <img class="direct-chat-img" src="dist/img/user1-128x128.jpg" alt="Message User Image"><!-- /.direct-chat-img -->
                                            <div class="direct-chat-text">
                                                What is java
                                            </div>
                                        </div>


                                        <?php
                                        // display the anser
                                        if (isset($_GET['ques_id'])){
                                            $quesId =  $_GET['ques_id'];
                                            $anskedBy = $_GET['askedby'];

                                            //echo $_SESSION['userId'];

                                            $getAnswer = $connection->query("SELECT * FROM forum_answers WHERE q_id = '$quesId' AND answered_by = '".$_SESSION['userId']."'  ");
                                            if ($getAnswer->num_rows) {
                                                while ($answers = $getAnswer->fetch_object()) { ?>
                                                    <!-- Message to the right -->
                                                    <div class="direct-chat-msg right">
                                                        <div class="direct-chat-info clearfix">
                                                            <span
                                                                class="direct-chat-name pull-right">Sarah Bullock</span>
                                                            <span
                                                                class="direct-chat-timestamp pull-left">23 Jan 2:05 pm</span>
                                                        </div>
                                                        <!-- /.direct-chat-info -->
                                                        <img class="direct-chat-img" src="dist/img/user3-128x128.jpg"
                                                             alt="Message User Image"><!-- /.direct-chat-img -->
                                                        <div class="direct-chat-text" style="background-color: #00e765">
                                                            <?php echo $answers->answer; ?>
                                                        </div>
                                                    </div>
                                                <?php }
                                            }
                                        }
                                        ?>


                                    </div>


                                    <div class="box-footer">
                                        <form action="" method="post" runat = "server" onsubmit="return ShowLoading()">
                                            <div class="input-group">
                                                <input type="text" name="answerText" placeholder="Type Message ..." class="form-control">
                                                <span class="input-group-btn">
                                                      <button type="submit" name="ansChatBtn" class="btn btn-primary btn-flat">Send</button>
                                                    </span>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- /.box-body -->
                        </div>
                    </div>
                </div>
            </div>

        </section>
    </div>
    <!-- /.content-wrapper -->

<?php include('footer.php');?>

<?php

if (isset($_POST['ansChatBtn'])){
    $quesId =  $_GET['ques_id'];
    $askedby =  $_GET['askedby'];
    $ans = $_POST['answerText'];

    $answerQuery = mysql_query("INSERT INTO forum_answers(q_id,answer,answered_by,asked_by)
      VALUES ('".$quesId."','".$ans."','".$_SESSION['userId']."','".$askedby."')");
    $url = "Location:give-your-ans.php?ques_id=".$quesId."&askedby=".$askedby;
    header($url );
}
