<?php include "../config/session_header.php"; ?>
<?php
$pageTitle = "Questions Asked  | Allenhouse Group of Colleges";
// $pageFor = "librarian";
include('header.php');?>

<?php
$activeTabDash = "";
$activeLinkDash = "";
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
        }
    </script>
    <!--==================Give question div=========================================================-->
    <?php

    if (isset($_GET['askedby']) && isset($_GET['ques_id'])) {
        $question_id = base64_decode($_GET['ques_id']);
        $validate = $connection->query("SELECT * FROM forum_questions WHERE q_id = '$question_id' ");
        if ($validate->num_rows > 0 ) {
            /*
             * means if question exist then we will display the question to user
             * to be answered.
             */
            $question_row = $validate->fetch_assoc();
            $questionis = $question_row['question'];
            $questionTitle = $question_row['title'];
            $whichDept     = $question_row['department'];

        } else {
            $questionis = 'N/A';
        }
    }
    else {
        header("Location:404.php");
    }

    ?>
    <section class="content">
        <div class="row">
            <div class="col-md-12">

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-warning">
                    <div class="box-body no-padding">
                            <div class="box-header">
                                <i class="glyphicon glyphicon-pencil"></i>
                                <h3 class="box-title">Write Your Answer</h3>
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
                                            <input type="image" name="saveAnsBtn" id="saveAnsBtn" onclick="saveAnswer('<?php echo $question_id ;?>','<?php echo $_SESSION['userId'] ;?>');" src="ownImages/other/save_icon.ico" width="30" height="30"/></td>
                                        <td>
                                            <span id="saveAnsResponse"></span>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <p class="lead">
                                                <span class="badge">Question:</span>
                                                <?php echo $questionis;?>
                                            </p>
                                        </td>
                                        <form action="" method="post" runat = "server" onsubmit="ShowLoading();">

                                        <td>
                                            <img src="ownImages/other/veritical-line-separator.png" width="1" height="50">
                                        </td>
                                        <td>
                                            <img src="ownImages/student/profile/student.png" width="50" height="50" class="img-circle">
                                        </td>
                                        <td> <span class="badge">Asked by :</span> Ankit kumar,CSE</td>

                                    </tr>
                                </table>
                                <div>

                                    <textarea name="answerText"></textarea>
                                    <script>
                                        CKEDITOR.replace( 'answerText' );
                                    </script>
                                </div>
                        </div>
                        <div class="box-footer clearfix">
                            <button type="submit" name="giveAnsBtn" class="pull-right btn btn-primary" id="sendEmail">Send
                                <i class="fa fa-arrow-circle-right"></i></button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->

<?php include('footer.php');?>

<?php
if (isset($_POST['giveAnsBtn'])){

    $answer = $_POST['answerText'];
    $askedby = base64_decode($_GET['askedby']);

    $answerQuery = $connection->query("INSERT INTO forum_answers(q_id,title,answer,answered_by,asked_by,dept,date_time)
      VALUES ('".$question_id."','".$questionTitle."','".$answer."','".$_SESSION['userId']."','".$askedby."','".$whichDept."',now())");
    /* $redirectto = "Location:forum-dicussion.php?timeline=active&ques_id=".$question_id."&asked_by=".$askedby;
    header($redirectto);*/

    header("Location:forum-dicussion.php?myactivity=active");
}

