<?php include "../config/session_header.php"; ?>
<?php include "../config/configuration.php";?>
<?php include_once "functions/career/Career.php";?>


<?php
$pageTitle = "Reports Allenforum | Allenhouse Group of Colleges";
include('header.php');?>

<?php
$activeTabDash = "";
$activeLinkDash = "";
?>

<?php include('sidebar.php');?>
<div class="content-wrapper">
    <section class="content">
        <div  class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <div class="tab-content">
                        <div class="box-header">
                            <i class="fa  fa-line-chart"></i>
                            <h3 class="box-title" id="companytitle">Reports</h3>
                            <div class="pull-right box-tools" style="display: <?php if($_SESSION['userrole'] == 'admin') echo 'block'; else echo 'none';?>">
                                <a href=""  title="Export Report" id="exportReportLink">
                                    <i class="fa  fa-download" style="font-size: 20px;"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="box box-widget widget-user">
                        <div class="box-footer">
                            <form>
                                <div class="row">
                                    <div class="col-md-3">
                                        <select name="reportType" id="reportType" class="form-control" onchange="getForumReports();">
                                            <option value="discussion_share">Discussion,Share</option>
                                            <option value="notes_upload">Notes Upload</option>
                                            <option value="contribution_post">Contribution Post</option>
                                            <option value="trending">All</option>
                                        </select>
                                    </div>
                                </div>
                            </form><br/>
                            <div class="table-responsive">
                                <center><img src="ownImages/other/loading/ajax-loader-list.gif" style="display: none;" id="reportLoader"></center>
                                <div id="reportData">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include('footer.php');?>
<script type="text/javascript">
    window.onload = function () {
        getForumReports();
    }
</script>




