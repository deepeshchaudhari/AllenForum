<?php include "../config/session_header.php"; ?>
<?php include_once "functions/student/Students.php";?>
<?php
$pageTitle = "Profile | Allenhouse Group of Colleges";
include('header.php');
?>

<?php
$activeTabDash = "active";
$activeLinkDash = "active";
/*$userQueryResult = $connection->query("select * from forum_users where user_id = '".$_SESSION['userId']."'  ")
or die("Login failed".$connection->error);
if ($userQueryResult->num_rows > 0){
    $userDetails = $userQueryResult->fetch_object();
}*/
$student = new Students();
$profile = $student->getStudentProfileDetails($connection,$_SESSION['userId']);
if ($profile->num_rows > 0){

    $profileDetails = $profile->fetch_object();
    $studentname = $profileDetails->student_name;
    $studentemail = $profileDetails->student_email;
    $studentcontact = $profileDetails->student_contact;
    $studentcourse = $profileDetails->course_name;
    $studentdepartment = $profileDetails->department_name;
    $studentprofile = $profileDetails->student_profile;
    $aboutstudent = $profileDetails->about_me;
    $studentyear = $profileDetails->student_year;

}
include('sidebar.php');
?>

<div class="content-wrapper">
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-widget widget-user">
                    <!-- Add the bg color to the header using any of the bg-* classes -->
                    <div class="widget-user-header bg-black">
                        <h3 class="widget-user-username"></h3>
                        <h5 class="widget-user-desc">
                        </h5>
                    </div>
                    <div class="widget-user-image">
                        <img class="img-circle" src="<?php if ($studentprofile) echo '../'.SPROFILE_BASEURL.$studentprofile; else echo DEFAULT_USER_PIC;?>" alt="User Avatar">
                    </div>

                    <div class="box-footer">
                        <p class="text-center">
                                <span class="lead"> <br/>
                                    <?php echo $studentname;?>
                                    <br/>
                                    <?php echo $_SESSION['userrole'] ?> :
                                    <?php echo $studentcourse;?>
                                    <?php echo $studentdepartment;?>,
                                    <?php
                                     switch ($studentyear){
                                         case '1' :
                                             echo $studentyear."st";break;
                                         case '2' :
                                             echo $studentyear."nd";break;
                                         case '3' :
                                             echo $studentyear."rd";break;
                                         case '4' :
                                             echo $studentyear."th";break;

                                     }
                                     ?>
                                    <?php echo "Allenhouse Group of Colleges ";?>
                                    <br/></span>
                            <?php echo "Kanpur";?>,
                            <?php echo "Uttar Pradesh";?>,
                            <?php echo "India";?>
                            <img src="ownImages/other/line.png"  width="100%" height="1"/>
                        </p>
                        <center>
                            <p class="description" style="font-size: 15px">
                                <?php echo $aboutstudent;?>
                            </p>
                            <span class="lead" style="font-weight: bolder">...</span>
                            <a href="edit-profile.php?profile=userIntroduction&id=<?php echo $_SESSION['userId'];?>">
                                <i class="glyphicon glyphicon-pencil fa-2x" > </i>
                            </a>
                        </center>
                        <?php
                        // check cv detail is completed or not
                        $common = new CommonFunctions();
                        $checkDetail = $common->isCvDetailsCompleted($connection,$_SESSION['userId'],$_SESSION['userrole']);
                        if ($checkDetail->num_rows > 0) {
                          echo '<a href="cv/templates/cvTemplate.php?cvFor=students&cvId='.base64_encode($_SESSION['userId']).'&id='.uniqid().'" title="Download CV"><i class="fa fa-download fa-2x pull-right"></i></a>';
                        } else{
                            echo '<a href="forum-cv.php?title=create my cv&id='.uniqid().' ">
                            <img src="ownImages/other/cv-icon.png" class="pull-right"/ >
                            </a>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
       <!-- <div class="row">
            <div class="col-lg-12">
                <div class="box box-widget widget-user">
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="exp-col-1-heading">
                                       <span class="lead">
                                           Stats
                                       </span>
                                </div>
                                <div class="exp-col-2-heading">
                                    <a href="">
                                        <img src="ownImages/student/profile/add-icon.png" width="40" height="40">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <table>
                                    <tr>
                                        <div class="box-footer no-padding">
                                            <ul class="nav nav-stacked">
                                                <li><a href="#">Projects <span class="pull-right badge bg-green"></span></a></li>
                                                <li><a href="#">Questions & Answer <span class="pull-right badge bg-red">55</span></a></li>
                                                <li><a href="#">Completed Projects <span class="pull-right badge bg-green">DESCRIPTION</span><span class="pull-right badge bg-red">3</span></a></li>
                                                <li><a href="#">Followers <span class="pull-right badge bg-red">842</span></a></li>
                                                <li><a href="#">See Full Resume <span class="pull-right badge bg-green">CLICK HERE</span></a></li>
                                                <li>
                                                    </br>
                                                    <center>
                                                        <a href="#"><img src="ownImages/student/profile/edit-icon.png" width="30" height="30"></a>
                                                    </center>
                                                </li>
                                            </ul>
                                        </div>
                                    </tr>
                                </table>
                                <img src="ownImages/other/line.png" width="100%" height="1"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>-->

        <div class="row">
            <div class="col-md-12">
                <div class="box box-widget widget-user">
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="exp-col-1-heading">
                                   <span class="lead">
                                       Experience
                                   </span>
                                </div>
                                <div class="exp-col-2-heading">
                                    <a href="#"  onclick="setProfileExpAction(event,'add','');">
                                        <img src="ownImages/student/profile/add-icon.png" width="40" height="40">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div id="getStudentWorkExp"></div>
                            <img src="ownImages/other/loading/blue_loading.gif" width="100" height="100" id="loadingExp"/>
                        </div>
                    </div>
                </div>
            </div>
        </div><!---->

        <div class="row">
            <div class="col-md-12">
                <div class="box box-widget widget-user">
                    <div class="box-footer">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="exp-col-1-heading">
                                   <span class="lead">
                                       Education
                                   </span>
                                </div>
                                <div class="exp-col-2-heading">
                                    <a href="#" onclick="setProfileSchoolingAction(event,'add','');">
                                        <img src="ownImages/student/profile/add-icon.png" width="40" height="40">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div id="getSchooling"></div>
                                <img src="ownImages/other/loading/blue_loading.gif" width="100" height="100" id="loadingSchooling"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--===========================// Profile Part 4 Education=======================-->
    </section>
</div>


<?php include "modals/student/modal-workexp.php"; ?>

<?php include "modals/student/modal-add-schooling.php"; ?>


<?php include('footer.php');?>
<script type="text/javascript">
    window.onload = function() {
        getStudentExperiences();
        getStudentSchooling();
    };
</script>
