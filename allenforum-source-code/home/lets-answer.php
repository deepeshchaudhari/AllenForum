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
$facultyLetsAnsTab = "active";






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
                                <input type="text" class="form-control input-sm" placeholder="Search Question">
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
                                <a href="lets-answer.php"><i class="fa fa-refresh"></i></a>
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
                         WHERE to_whome = '".$_SESSION['userId']."' order by q_id DESC ")
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
                                        <th>Status</th>
                                        <th>Time</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $q_srNo = 1;
                                    while ($myQuestions = mysql_fetch_array($questions)) { ?>
                                        <tr>
                                            <td><input type="checkbox"></td>

                                            <td><?php echo $q_srNo;?></td>
                                            <td class="mailbox-name">
                                                <a href="give-your-answer.php?ques_id=<?php echo base64_encode($myQuestions['q_id'])."&askedby=".base64_encode($myQuestions['asked_by']);?>" >
                                                    <?php echo $myQuestions['category'];?>
                                                </a>
                                            </td>
                                            <td class="mailbox-subject">
                                                <b><?php echo $myQuestions['title'];?></b>
                                                | <?php echo $myQuestions['question'];?>
                                            </td>
                                            <td>
                                                <?php
                                                /*
                                                 * validate, that whether this person given anser or not
                                                 * and confirmation as well, on the basis of green and yello icon
                                                 */
                                                $validateStatus = mysql_query("SELECT * FROM forum_answers 
                                                WHERE q_id = '".$myQuestions['q_id']."' AND answered_by = '".$_SESSION['userId']."'  ");
                                                if (mysql_num_rows($validateStatus)){
                                                    echo '<div class="answer-given"></div>';
                                                } else{
                                                    echo '<div class="answer-pending"></div>';
                                                }
                                                ?>

                                            </td>
                                            <td class="mailbox-date">5 mins ago</td>
                                        </tr>
                                    <?php $q_srNo++ ;
                                      } ?>

                                    </tbody>
                                </table>
                                <!-- /.table -->
                            </div>
                        <?php } else{ ?>
                            <span class="badge center-block" style="background-color: #ff6e06">
                                <?php echo "You have'nt been asked any question !";?>
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
