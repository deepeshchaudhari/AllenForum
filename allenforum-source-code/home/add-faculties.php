<?php include "../config/session_header.php"; ?>
<?php include_once "functions/common/Common.php";?>

<?php
$pageTitle = "Add Faculty | Allenhouse Group of Colleges";
include('header.php');
?>

<?php
$activeTabDash = "";
$activeLinkDash = "";
include('sidebar.php');

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
                          <h3 class="box-title"><a href="dashboard.php"><i class="fa  fa-arrow-left">      Dashboard</i></a></h3>
                      </div>
                      <div class="box-body">
                          <form id="addFacultyForm">
                              <div class="row">
                                  <div class="col-md-3">
                                      <label>Name <span class="field-required">*</span></label>
                                      <input type="text" name="faculty_name" id="faculty_name" class="form-control" placeholder="Faculty Name" required>
                                  </div>
                                  <div class="col-md-3">
                                      <label>Email <span class="field-required">*</span></label>
                                      <input type="text" name="faculty_email" id="faculty_email" class="form-control" placeholder="Faculty Email" required>
                                  </div>
                                  <div class="col-md-3">
                                      <label>Password <span class="field-required">*</span></label>
                                      <input type="text" name="faculty_pass" id="faculty_pass" class="form-control" placeholder="Create Password" required>
                                  </div>

                                  <div class="col-md-3">
                                      <label>Contact <span class="field-required">*</span></label>
                                      <input type="number" name="faculty_contact" id="faculty_contact" class="form-control" placeholder="Phone/Contact" required>
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
                              </div>
                              <div class="row">
                                  <div class="col-md-3"><br/>
                                      <button type="submit"  name="addFaculyBtn" id="addFaculyBtn" class="btn btn-success" >
                                          <i class="fa fa-check-circle"></i> Add Faculty</button>
                                      <img src="ownImages/other/loading/blue_loading.gif" width="45" height="45" id="addFacultyLoader" style="display: none;">

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
                          <h3 class="box-title"><a href="dashboard.php"><i class="fa  fa-arrow-left"> Upload Sheet of Faculty</i></a></h3>
                      </div>
                      <div class="box-body">
                          <form action="" method="post" enctype="multipart/form-data" runat="server"  onsubmit="ShowLoading()">
                              <div class="row">
                                  <div class="col-md-3">
                                      <input type="file" name = "facultySheet" class="form-control"/>
                                  </div>
                                  <div class="col-md-3">
                                      <button type="submit" name="addFacultyWithCSVBtn" class="btn btn-success" formaction="scripts/admin/add-faculty-script.php"><i class="fa fa-check-circle"></i> Upload Sheet</button>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>-->

      </section>

  </div>
  <!-- /.content-wrapper -->
  <?php include('footer.php');?>
 