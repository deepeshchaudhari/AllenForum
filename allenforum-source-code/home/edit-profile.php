<?php include "../config/session_header.php"; ?>
<?php include_once "functions/student/Students.php";?>
<?php include_once "functions/common/Common.php";?>


<?php
$pageTitle = "Edit Profile | Allenhouse Group of Colleges";
include('header.php');
$activeTabDash = "active";
$activeLinkDash = "active";
include('sidebar.php');
?>
<?php
$student = new Students();
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
                    <i class="glyphicon glyphicon-saved"></i>
                    <h3 class="box-title">Profile Update</h3>
                    <div class="pull-right box-tools">
                       <span>
                           <img src="ownImages/other/gif_processing.gif" width="30" height="30">
                       </span>
                    </div>
                </div>
                <?php

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
                    $studentCollege = $profileDetails->current_college;
                }


                ?>
                <div class="box-footer">
                    <div class="post">
                        <div class="user-block">
                            <form id="editStudentProfile" enctype="multipart/form-data" class="form-horizontal">
                                <div class="box-body">
                                  <div class="row">
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="inputname" class="col-sm-2 control-label">NAME</label>
                                              <div class="col-sm-10">
                                                  <input type="text" name="student_name" id="student_name" value="<?php echo $studentname;?>"  placeholder="Name" class="form-control" />
                                              </div>
                                          </div>
                                      </div>
                                      <div class="col-md-6">
                                          <div class="form-group">
                                              <label for="inputcolleges" class="col-sm-2 control-label">COLLEGE</label>
                                              <div class="col-sm-10">
                                                  <input type="text" name="college_name" id="college_name" value="<?php echo $studentCollege;?>"  placeholder="College" class="form-control" />
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="inputname" class="col-sm-2 control-label">COURSE</label>
                                                <div class="col-sm-10">
                                                    <select name="course_program" id="course_program" onchange="getDepartmentByCourse(this.value,'profile_update');" class="form-control">
                                                        <option value="" >COURSE</option>
                                                        <?php while ($course = $courses->fetch_object()) {  ?>
                                                            <option value="<?php echo $course->id;?>" <?php if ($studentcourse == $course->course_name ) echo 'selected'; ?> ><?php echo $course->course_name;?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="branch" class="col-sm-2 control-label">BRANCH</label>
                                                <div class="col-sm-10">
                                                    <select name="department_branch" id="department_branch" class="form-control" >
                                                        <option value="" >BRANCH</option>
                                                       <?php while ($department = $departments->fetch_object()){ ?>
                                                           <option value="<?php echo $department->id;?>" <?php if ($studentdepartment == $department->department_name) echo 'selected';?> ><?php echo $department->department_name;?></option>
                                                        <?php } ?>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="year" class="col-sm-2 control-label">YEAR</label>
                                                    <div class="col-sm-10">
                                                        <select name="year" id="year" class="form-control" required>
                                                            <option value="" >SELECT</option>
                                                            <option value="1" <?php if ($studentyear == 1) echo 'selected';?>>1</option>
                                                            <option value="2" <?php if ($studentyear == 2) echo 'selected';?>>2</option>
                                                            <option value="3" <?php if ($studentyear == 3) echo 'selected';?>>3</option>
                                                            <option value="4" <?php if ($studentyear == 4) echo 'selected';?>>4</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputPassword3" class="col-sm-2 control-label">PROFILE</label>
                                                    <div class="col-sm-10">
                                                        <input type="file" name="profile_pic" id="profile_pic" class="form-control" />
                                                        <input type="hidden" name="prev_profile" id="prev_profile" value="<?php echo $studentprofile;?>">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-2 control-label">CONTACT</label>
                                                    <div class="col-sm-10">
                                                        <input type="text" name="contact" id="contact" value="<?php echo $studentcontact;?>"  placeholder="Contact" maxlength="10" class="form-control" />
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="inputEmail3" class="col-sm-2 control-label">DESCRIPTION</label>
                                                    <div class="col-sm-10">
                                                        <textarea name="description" id="description" placeholder="Description" class="form-control"><?php echo $aboutstudent;?></textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <input type="hidden" id="studentProfileUpdate" name="studentProfileUpdate" value="studentProfileUpdate" />
                                                    <label for="inputEmail3" class="col-sm-2 control-label"></label>
                                                    <div class="col-sm-10">
                                                        <button type="submit" name="updateStudentProfileBtn" id="updateStudentProfileBtn" class="btn btn-primary btn-flat">Update <i class="fa fa-check"></i>  </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
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