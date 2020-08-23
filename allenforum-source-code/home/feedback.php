<?php include "../config/session_header.php"; ?>
<?php include_once "functions/common/Common.php";?>

<?php
$pageTitle = "Feedback| Allenhouse Group of Colleges";
include('header.php');
?>
<?php
$activeTabDash = "active";
$activeLinkDash = "active";
include('sidebar.php');
?>
<?php
$common = new CommonFunctions();
$courses = $common->getCourses($connection);
$departments = $common->getDepartments($connection);
?>
    <div class="content-wrapper">
        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box box-widget widget-user">
                        <div class="box-header">
                            <i class="glyphicon glyphicon-pencil"></i>
                            <h3 class="box-title">AllenForum Feedback</h3>
                            <div class="pull-right box-tools">
                               <span>
                                   <img src="ownImages/other/gif_processing.gif" width="30" height="30">
                               </span>
                            </div>
                        </div>
                        <form id="feedbackForm">
                        <div class="box-footer">
                          <div class="alert bg-green-gradient" id="feedbackresponse" style="display: none;">
                              Thank you for giving your feedback
                          </div>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select name="departmemt" id="departmemt" class="form-control">
                                            <option value="" >Select Department</option>
                                            <?php while ($department = $departments->fetch_object()){ ?>
                                                <option value="<?php echo $department->id;?>" ><?php echo $department->department_name;?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="text" name="post_title" id="post_title" placeholder="Enter feedback title" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                            <div class="post">
                                <div class="user-block">
                                    <div>
                                        <textarea name="feedback_text"  id="feedback_text"></textarea>
                                        <script>
                                            CKEDITOR.replace( 'feedback_text' );
                                        </script>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group" style="float: right">
                                            <button type="submit" name="writefeedbackBtn" id="writefeedbackBtn" class="btn btn-primary btn btn-flat">
                                                Send Feedback <i class="glyphicon glyphicon-flag"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           </div>
                        </form>
                     </div>
                 </div>

            </div>
        </section>
    </div>

<?php include('footer.php');?>

<?php
/*
 * jQuery realted task is writen in footer.php
 * below thw jQuery script
 */

?>