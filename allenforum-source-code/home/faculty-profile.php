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
?>
<?php
$common = new CommonFunctions();
$courses = $common->getCourses($connection);
$departments = $common->getDepartments($connection);
?>
<?php
/* show faculty profile */
$faculty = new Faculty();
$profileDetails = $faculty->getFacultyProfileDetails($connection,$_SESSION['userId']);
if ($profileDetails->num_rows > 0)
{
    $profile = $profileDetails->fetch_object();
    $facultyName = $profile->facultyName;
    $facultyEmail = $profile->facultyEmail;
    $facultyContact = $profile->facultyContact;
    $facultyProfile = $profile->facultyProfile;
    $facultyProgram = $profile->facultyProgram;
    $facultyDepartment = $profile->facultyDepartment;
    $emailSms = $profile->emailSms;
}

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
                        <img class="img-circle" src="<?php if ($facultyProfile) { echo '../'.FPROFILE_BASEURL.$facultyProfile ;} else {echo DEFAULT_USER_PIC;}?>" alt="User Avatar">
                    </div>
                    <div class="box-footer">
                        <p class="text-center"><span class="lead"> <br/><?php echo $facultyName;?><br/><?php echo $facultyProgram;?>, <?php echo $facultyDepartment;?>, <?php echo "Allenhouse Group of Colleges ";?><br/></span> </p>
                        <a href="#" data-toggle="modal" data-target="#modalEditFacultyProfile" class="pull-right" onclick="getFacultyDetails();" title="Edit Profile">
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
                                                <li><a href="#">Program <span class="pull-right badge bg-green"><?php echo $facultyProgram;?></span></a></li>
                                                <li><a href="#">Department <span class="pull-right badge bg-primary"><?php echo $facultyDepartment;?></span></a></li>
                                                <li><a href="#">Email <span class="pull-right badge bg-maroon-active"><?php echo $facultyEmail;?></span></a></li>
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


<?php include "modals/profile/modal-edit-faculty-profile.php"; ?>
<?php include('footer.php');?>

