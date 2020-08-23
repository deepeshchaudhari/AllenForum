<?php include "../config/session_header.php"; ?>
<?php include "../config/configuration.php";?>
<?php include_once "functions/common/Common.php";?>
<?php
$pageTitle = "Students Details | Admin | Allenhouse Group of Colleges";
include('header.php');
$activeTabDash = "";
$activeLinkDash = "";
$common = new CommonFunctions();
$courses = $common->getCourses($connection);
?>
<?php include('sidebar.php');?>
<div class="content-wrapper">
    <section class="content">
        <div  class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <div class="tab-content">
                        <div class="box-header">
                            <i class="glyphicon glyphicon-education"></i>
                            <h3 class="box-title">Students List</h3>
                            <div class="pull-right box-tools">
                               <span>
                                   <img src="ownImages/other/gif_processing.gif" width="30" height="30">
                               </span>
                            </div>
                        </div> <hr/>
                        <div class="table-responsive">
                            <table id="studentsRecordTable" class="table table-stripped ">
                                <thead>
                                <tr style="background-color:#009688 ;color: white;">
                                    <th style="border: 1px solid #009688;">Sr.</th>
                                    <th style="border: 1px solid #009688;">Roll No.</th>
                                    <th style="border: 1px solid #009688;">Name</th>
                                    <th style="border: 1px solid #009688;">Email</th>
                                    <th style="border: 1px solid #009688;">Password</th>
                                    <th style="border: 1px solid #009688;">Program</th>
                                    <th style="border: 1px solid #009688;">Branch</th>
                                    <th style="border: 1px solid #009688;">Edit</th>
                                    <th style="border: 1px solid #009688;">Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                $students = $connection->query("SELECT fs.user_id,fs.student_roll,fu.user_email as student_email,fs.student_name,fs.student_contact,fc.course_name as student_course,fd.department_name as student_department, fs.student_year,fs.student_profile FROM forum_users fu left join forum_student fs on fu.id=fs.user_id left join forum_courses fc on fs.student_program=fc.id LEFT JOIN forum_departments fd on fs.student_department=fd.id WHERE fu.user_role = 'student'"); // find q_id
                                $sr = 1;
                                while ($student = $students->fetch_object() ){
                                    ?>
                                    <tr>
                                        <td class="s-list"><?php echo $sr;?></td>
                                        <td class="s-list"><?php echo $student->student_roll;?></td>
                                        <td class="s-list"><?php echo $student->student_name;?></td>
                                        <td class="s-list"><?php echo $student->student_email;?></td>
                                        <td class="s-list"><?php echo $student->student_roll;?></td>
                                        <td class="s-list"><?php echo $student->student_course;?></td>
                                        <td class="s-list"><?php echo $student->student_department;?></td>
                                        <td class="s-list"><a href="#" data-toggle="modal" data-target="#modalEditStudent"><i class="glyphicon glyphicon-pencil"></i></a> </td>
                                        <td style="border:1px solid #009688;color: red"><i class="glyphicon glyphicon-remove-circle"></i> </td>
                                    </tr>
                                    <?php $sr++; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="modalEditStudent" tabindex="-1" role="dialog" aria-labelledby="modalEditStudent">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="addComapnyInfo">
                <div class="modal-header popup-header-teal" >
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">Edit Student</h4>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="hidden" id="studentEditId" name="companyEditId" value=""/>
                                <label for="title" class="control-label">Roll No. <span class="field-required">*</span> </label>
                                <input type="text" name="company_name"  id="company_name" placeholder="Roll Number"   class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="hidden" id="studentEditId" name="companyEditId" value=""/>
                                <label for="title" class="control-label">Password. <span class="field-required">*</span> </label>
                                <input type="text" name="student_password"  id="student_password" placeholder="Password"   class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputname" class=" control-label">Name</label>
                                <input type="text" name="student_name" id="student_name"  placeholder="Student Name" class="form-control" onchange="validateCompanyLogo();" />
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="title" class="control-label">Contact. <span class="field-required">*</span> </label>
                                <input type="text" name="student_contact"  id="student_contact" placeholder="Contact"   class="form-control" >
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="title" class="control-label">Email <span class="field-required">*</span></label>
                                <input type="text" name="student_email"  id="student_email" placeholder="Email"   class="form-control" >
                            </div>
                        </div>

                    </div>
                    <div class="row">

                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <label for="student-position" class="control-label">Course <span class="field-required">*</span></label>
                            <select name="student_courses" id="student_courses" class="form-control" onchange="getDepartmentsByCourse(this.value)";>
                                <option value="">Select</option>
                                <?php
                                if ($courses->num_rows > 0){
                                    while ($rows = $courses->fetch_object()) {
                                        echo '<option value=" ' . $rows->id . '">' . $rows->course_name . '</option>';
                                    }
                                }
                                ?>

                            </select>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputname" class=" control-label">Department</label>
                                <select name="student_program" id="student_program" class="form-control">
                                    <option value="">Select</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="inputname" class=" control-label">Year</label>
                                <select name="student_program" id="student_program" class="form-control">
                                    <option value="">Select</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default btn-flat" data-dismiss="modal">Cancel</button>
                    <button type="submit" id="editStudentBtn" name="editStudentBtn"  class="btn btn-primary btn-flat popup-submit-teal">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('footer.php');?>




