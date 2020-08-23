<?php include "../config/session_header.php"; ?>
<?php include_once "functions/common/Common.php";?>
<?php
  $pageTitle = "Add Students | Allenhouse Group of Colleges";
  include('header.php');
?>
<?php
$activeTabDash = "";
$activeLinkDash = "";
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
              <div class="col-md-12">
                  <div class="box box-success">
                      <div class="box-header with-border">
                          <h3 class="box-title"><a href="dashboard.php"><i class="fa  fa-arrow-left">Dashboard</i></a></h3>
                      </div>
                      <div class="box-body">
                          <form id="addStudentForm">
                              <div class="row">
                                  <div class="col-md-3">
                                      <label>Name <span class="field-required">*</span> </label>
                                      <input type="text" name="student_name" id="student_name" class="form-control" placeholder="Student Name" required>
                                  </div>
                                  <div class="col-md-3">
                                      <label>Email <span class="field-required">*</span></label>
                                      <input type="text" name="student_email" id="student_email" class="form-control" placeholder="Student Email" required>
                                  </div>
                                  <div class="col-md-3">
                                      <label>Roll No. <span class="field-required">*</span></label>
                                      <input type="text" name="student_roll_no" id="student_roll_no" maxlength="10" placeholder="Roll Number" class="form-control">
                                  </div>

                                  <div class="col-md-3">
                                      <label>Contact <span class="field-required">*</span></label>
                                      <input type="text" name="student_contact" id="student_contact" class="form-control" maxlength="10" placeholder="Phone/Contact" required>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-3">
                                      <label>Course <span class="field-required">*</span></label>
                                      <select name="course_program" id="course_program" class="form-control" required="required" onchange="getDepartmentByCourse(this.value,'');">
                                          <option value="">Course</option>
                                          <?php while ($course = $courses->fetch_object()) {  ?>
                                              <option value="<?php echo $course->id.'^'.$course->course_name;?>" ><?php echo $course->course_name;?></option>
                                          <?php } ?>
                                      </select>
                                  </div>
                                  <div class="col-md-3">
                                      <label>Department <span class="field-required">*</span></label>
                                      <select name="department_branch" id="department_branch"  class="form-control" required="required">
                                          <option value="">Department</option>
                                          <?php while ($department = $departments->fetch_object()){ ?>
                                              <option value="<?php echo $department->id;?>" ><?php echo $department->department_name;?></option>
                                          <?php } ?>
                                      </select>
                                  </div>


                                  <div class="col-md-3">
                                      <label>Year <span class="field-required">*</span></label>
                                     <div class="form-group">
                                         <select name="student_year" id="student_year" required class="form-control">
                                             <option value="" >Year</option>
                                             <option value="1">1</option>
                                             <option value="2">2</option>
                                             <option value="3">3</option>
                                             <option value="4">4</option>
                                         </select>
                                     </div>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-md-3"><br/>
                                      <button type="submit"  name="addStudentBtn" id="addStudentBtn" class="btn btn-success">
                                          <i class="fa fa-check-circle"></i> Add Student</button>
                                      <img src="ownImages/other/loading/blue_loading.gif" width="45" height="45" id="addStudentLoader" style="display: none;">
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>
          <!--<div class="row">
              <div class="col-md-12">
                  <div class="box box-success">
                      <div class="box-header with-border">
                          <h3 class="box-title"><a href="dashboard.php"><i class="fa  fa-arrow-left"> Upload Sheet of student</i></a></h3>
                      </div>
                      <div class="box-body">
                          <form action="" method="post" enctype="multipart/form-data" runat="server"  onsubmit="ShowLoading()">
                              <div class="row">
                                  <div class="col-md-3">
                                      <input type="file" name = "studentSheet" class="form-control"/>
                                  </div>
                                  <div class="col-md-3">
                                      <button type="submit" name="addStudentWithCSVBtn" class="btn btn-success" formaction="scripts/admin/add-student-script.php"><i class="fa fa-check-circle"></i> Upload Sheet</button>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>-->
      </section>
  </div>
  <?php include('footer.php');?>
 