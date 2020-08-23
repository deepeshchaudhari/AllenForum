<?php include "../config/session_header.php"; ?>
<?php include "../config/configuration.php";?>
<?php include_once "functions/career/Career.php";?>


<?php
$pageTitle = "Shared Questions | Allenhouse Group of Colleges";
include('header.php');?>

<?php
$activeTabDash = "";
$activeLinkDash = "";
$career = new Career();
$department = $career->getAllDepartment($connection);
?>

<?php include('sidebar.php');?>
<div class="content-wrapper">
    <section class="content">
        <div  class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <div class="tab-content">
                        <div class="box-header">
                            <i class="glyphicon glyphicon-saved"></i>
                            <h3 class="box-title" id="companytitle">Company Information</h3>
<!--                            <input type="text" name="search" id="searchCopmany" placeholder="Search.." onkeyup="searchCompany();">-->

                            <div class="pull-right box-tools" style="display: <?php if($_SESSION['userrole'] == 'admin') echo 'block'; else echo 'none';?>">
                                <a href="#"  title="Add Compnay" onclick="addEditComapanyInfo('add');">
                                    <img src="ownImages/student/profile/add-icon.png" width="40" height="40">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="box box-widget widget-user">
                        <div class="box-footer">
                            <center>
                                <img src="ownImages/other/loading/blue_loading.gif" width="100" height="100" id="companyListLoader"/>
                            </center>
                           <div id="load-comapany-list"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include ('modals/career/modal-add-company-info.php');?>
<?php include('footer.php');?>
<script type="text/javascript">
    window.onload = function() {
        getCompanyList();
    };
</script>




