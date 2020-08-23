<?php include "../config/session_header.php"; ?>
<?php include_once "functions/common/Common.php";?>

<?php
$pageTitle = "Questions Asked  | Allenhouse Group of Colleges";
include('header.php');
$activeTabDash = "";
$activeLinkDash = "";
?>

<?php include('sidebar.php');?>
<?php
$common = new CommonFunctions();
$courses = $common->getCourses($connection);
$departments = $common->getDepartments($connection);
?>

<div class="content-wrapper">
    <section class="content">
        <div  class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <div class="tab-content">
                        <div class="box-header">
                            <i class="fa  fa-commenting"></i>
                            <h3 class="box-title">Type Your Query here</h3>
                            <div class="pull-right box-tools">
                               <span>
                                   <img src="ownImages/other/gif_processing.gif" width="30" height="30">
                               </span>
                            </div>
                        </div> <hr/>
                        <form  name="askquestion_form" id="askquestion_form" enctype="multipart/form-data">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <select name="askWithWhome" id="askWithWhome" class="form-control" >
                                                <option value="" >Select Authority</option>
                                                <option value="student">Student</option>
                                                <option value="faculty">Faculty</option>
                                                <option value="all">All</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3" id="courseDiv">
                                        <div class="form-group">
                                            <select name="askWithWhomeCourse" id="askWithWhomeCourse" class="form-control"  onchange="getDepartmentByCourse(this.value,'discussion');">
                                                <option value="" >Select Course</option>
                                                <?php while ($course = $courses->fetch_object()) {  ?>
                                                    <option value="<?php echo $course->id.'^'.$course->course_name;?>" ><?php echo $course->course_name;?></option>
                                                <?php } ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <select name="shareWithdepartment" id="department_branch" class="form-control">
                                                <option value="" selected disabled>Select Department</option>
                                                <?php while ($department = $departments->fetch_object()){ ?>
                                                    <option value="<?php echo $department->id;?>" ><?php echo $department->department_name;?></option>
                                                <?php } ?>
                                                <option value="n">All</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-sm-3" id="yearDiv">
                                        <div class="form-group">
                                            <select name="shareWithYear" id="shareWithYear" class="form-control" >
                                                <option value="">Select Year</option>
                                                <option value="1">1</option>
                                                <option value="2">2</option>
                                                <option value="3">3</option>
                                                <option value="4">4</option>
                                                <option value="n">All</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="question_title" id="question_title"  placeholder="Enter Query Title"  class="form-control"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-body pad">
                                <textarea name="your_question"  id="your_question"></textarea>
                                <script>
                                    CKEDITOR.replace( 'your_question' );
                                </script>
                            </div>
                            <div class="box-footer">
                                <div class="pull-right">
                                    <input type="hidden" id="actionAskQuestion" name="actionAskQuestion" value="actionAskQuestion">
                                    <button type="submit" name="askQuestionBtn" id="askQuestionBtn" class="btn btn-primary btn-flat"> Send <i class="fa fa-arrow-circle-right"></i> </button>
                                </div>
                                <div class="btn btn-default btn-file btn-flat">
                                    <i class="fa fa-paperclip"></i> Problem Pic <input type="file" name="problem_pics"  id="attachment" onChange="checkAttachment();">
                                </div>
                                <p class="help-block">100KB</p>
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




