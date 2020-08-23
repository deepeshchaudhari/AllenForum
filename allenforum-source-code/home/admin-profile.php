<?php include "../config/session_header.php"; ?>
<?php include_once "functions/faculty/Faculty.php";?>
<?php include_once "functions/common/Common.php";?>
<?php
$pageTitle = "Profile | Allenhouse Group of Colleges";
include('header.php');
?>

<?php
$activeTabDash = "active";
$activeLinkDash = "active";
include('sidebar.php');
$adminProfile = $profile; // this taken from header.php file
?>


<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-widget widget-user">
                    <div class="widget-user-header bg-teal">
                        <h3 class="widget-user-username"></h3>
                        <h5 class="widget-user-desc">
                        </h5>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle" src="<?php if ($adminProfile) { echo '../'.APROFILE_BASEURL.$adminProfile ;} else {echo DEFAULT_USER_PIC;}?>" alt="User Avatar">
                    </div>
                    <div class="box-footer">
                        <p class="text-center"><br/><span class="lead" id="adminProfileNameLabel"></span> <br/><span class="lead">Adminstration, Allenhouse Group of Colleges</span> </p>
                        <a href="#" data-toggle="modal" data-target="#modalEditAdminProfile" class="pull-right" onclick="getAdminProfileDetailsForEdit('<?php echo $_SESSION['userId'];?>');" title="Edit Profile">
                            <span class="lead" style="font-weight: bolder">...</span> <i class="glyphicon glyphicon-pencil fa-2x" > </i>
                        </a>
                    </div>
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-lg-12">
                                <table>
                                    <tr>
                                        <div class="box-footer no-padding">
                                            <ul class="nav nav-stacked">
                                                <li><a href="#">Contact <span class="pull-right badge bg-green" id="adminProfileContactLabel"></span></a></li>
                                                <li><a href="#">Department <span class="pull-right badge bg-primary" id="adminProfileDeptLabel"></span></a></li>
                                                <li><a href="#">Email <span class="pull-right badge bg-maroon-active" id="adminProfileEmailLabel"></span></a></li>
                                            </ul>
                                        </div>
                                    </tr>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>


<?php include "modals/profile/modal-edit-admin-profile.php"; ?>
<?php include('footer.php');?>

<script type="text/javascript">
    window.onload = function() {
        getAdminProfileDetailsForEdit('<?php echo $_SESSION['userId'];?>');
    };
</script>

