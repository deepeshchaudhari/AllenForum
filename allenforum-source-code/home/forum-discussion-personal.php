<?php include "../config/session_header.php"; ?>
<?php include "functions/common/Common.php";?>
<?php
$pageTitle = "Trending | Allenhouse Group of Colleges";
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
                        <h3 class="box-title pull-left">Choose a User <i class="fa fa-fire"></i></h3>

                       <!-- <h3 class="box-title pull-right">
                            <a href="forum-start-chat.php" data-toggle="tooltip" data-original-title="View Discussion List">
                                <img src="ownImages/other/right-arrow.png">
                            </a>
                        </h3>-->
                    </div>

                    <div class="box-footer">
                        <div class="post">
                            <div class="box-comment">
                                <div class="single-discussion">
                                    <div class="row">
                                        <div class="col-lg-3 ">
                                            <div class="form-group">
                                                <select name="discussionUserrole" id="discussionUserrole" class="form-control" onchange="getSingleDiscussionData();">
                                                    <option value="student">Student</option>
                                                    <option value="faculty">Faculty</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-3">
                                            <div class="form-group">
                                                <select name="discussDepartment" id="discussDepartment" class="form-control" onchange="getSingleDiscussionData();">
                                                    <option value="">Select Department</option>
                                                    <?php while ($department = $departments->fetch_object()){ ?>
                                                        <option value="<?php echo $department->id;?>" ><?php echo $department->department_name;?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 ">
                                            <div class="form-group">
                                               <input type="text" name="discussionNameSearch" id="discussionNameSearch" class="form-control" onkeyup="getSingleDiscussionData();" placeholder="Search with name">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <center>
                                            <img src="ownImages/other/loading/ajax-loader-list.gif" id="loadDiscussionList" style="display: none" />
                                        </center>
                                        <div id="discussion-users">
                                       </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="modalDiscussPersonally" tabindex="-1" role="dialog" aria-labelledby="postDiscussion">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="singleDiscussionForm">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel"><b>Discuss Personally</b></h4>
                </div>
                <div class="modal-body">
                    <div class="box-body pad">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <input type="text" name="discussionTitle" id="discussionTitle" placeholder="Discussion Title"    class="form-control"/>
                                </div>
                            </div>
                        </div>
                        <textarea name="discussionMessage" id="discussionMessage"></textarea>
                        <script>
                            CKEDITOR.replace( 'discussionMessage' );
                        </script>
                    </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="discussionPersonId" id="discussionPersonId" value="" />
                    <button type="submit" class="btn btn-sm btn-danger btn-flat" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-sm btn-info btn-flat" id="sendSingleDiscussion" >Send</button>
                    <button type="submit" class="btn btn-sm btn-info btn-flat" id="sendSingleDiscussionBtnLoading" style="display: none;">
                        <img src="ownImages/other/loading/btn-loading.gif" width="20" height="20"/>Sending...
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('footer.php');?>

