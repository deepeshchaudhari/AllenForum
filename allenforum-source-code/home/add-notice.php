<?php include "../config/session_header.php"; ?>
<?php
$pageTitle = "Add Notices   | Allenhouse Group of Colleges";
// $pageFor = "librarian";
include('header.php');?>

<?php
$activeTabDash = "";
$activeLinkDash = "";
include('sidebar.php');
?>

<?php include('sidebar.php');?>

<div class="content-wrapper">
    <section class="content">
        <div  class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <div class="tab-content">
                        <div class="box-header">
                            <i class="glyphicon glyphicon-pencil"></i>
                            <h3 class="box-title">Type Notice</h3>
                            <span> <a href="add-notice.php">  <i class="glyphicon glyphicon-plus"></i> </a>
                            </span>
                            <div class="pull-right box-tools">
                               <span>
                                   <img src="ownImages/other/gif_processing.gif" width="30" height="30">
                               </span>
                            </div>
                        </div><hr/>
                        <form id="addNoticeForm">

                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <select name="noticeFor" id="noticeFor" class="form-control">
                                                <option value="">Select Users</option>
                                                <option value="all">Common to All</option>
                                                <option value="students">Student Only</option>
                                                <option value="faculties">Faculty Only</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3">
                                        <div class="form-group">
                                            <input type="text" name="noticeDate" class="form-control" id="noticeDate" readonly style="cursor: pointer" placeholder="Select Date ">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-8">
                                        <div class="form-group">
                                            <input type="text" name="noticeSubject" id="noticeSubject" class="form-control"  placeholder="Notice Subject">
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <textarea name="noticeText"  id="noticeText"></textarea>
                                    <script>
                                        CKEDITOR.replace( 'noticeText' );
                                    </script>
                                </div>
                            </div>
                            <div class="box-footer clearfix">
                                <input type="hidden" id="noticeAction" name="noticeAction" value="add">

                                <button type="submit" name="addNoticeBtn" class="pull-right btn btn-default btn-flat" id="addNoticeBtn">Send
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




