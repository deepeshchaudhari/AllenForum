<?php include "../config/session_header.php"; ?>
<?php
$pageTitle = "Students Details | Admin | Allenhouse Group of Colleges";
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
                            <i class="glyphicon glyphicon-user"></i>
                            <h3 class="box-title">Faclties</h3>
                            <div class="pull-right box-tools">
                               <span>
                                   <img src="ownImages/other/gif_processing.gif" width="30" height="30">
                               </span>
                            </div>
                        </div> <hr/>

                        <div class="table-responsive">
                            <table class="table table-stripped">
                                <thead>

                                <tr style="background-color: #2196F3;color: white;">
                                    <th style="border: 1px solid #2196F3">Sr.</th>
                                    <th style="border: 1px solid #2196F3">Name</th>
                                    <th style="border: 1px solid #2196F3">Department</th>
                                    <th style="border: 1px solid #2196F3">Email</th>
                                    <th style="border: 1px solid #2196F3">Password</th>
                                    <th style="border: 1px solid #2196F3">Contact</th>
                                    <th style="border: 1px solid #2196F3">Edit</th>
                                    <th style="border: 1px solid #2196F3">Delete</th>
                                    <th style="border: 1px solid #2196F3">Select</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                $faculties = $connection->query("SELECT ff.name as faculty_name,fu.user_email as faculty_email,fu.user_pass AS faculty_pass,ff.contact as faculty_contact,ff.program as faculty_program,ff.department as faculty_department,ff.profile as faculty_profile,fc.course_name as faculty_program,fd.department_name as faculty_department FROM forum_faculty ff LEFT JOIN forum_users fu ON ff.user_id=fu.id LEFT JOIN forum_courses fc ON ff.program=fc.id LEFT JOIN forum_departments fd ON ff.department=fd.id WHERE fu.user_role='faculty'"); // find q_id
                                $sr = 1;
                                while ($faculty = $faculties->fetch_object() ){
                                    ?>
                                    <tr>
                                        <td style="border: 1px solid  #2196F3;"><?php echo $sr;?></td>
                                        <td style="border: 1px solid #2196F3"><?php echo $faculty->faculty_name;?></td>
                                        <td style="border: 1px solid #2196F3"><?php echo $faculty->faculty_department;?></td>
                                        <td style="border: 1px solid #2196F3"><?php echo $faculty->faculty_email;?></td>
                                        <td style="border: 1px solid #2196F3"><?php echo $faculty->faculty_pass;?></td>
                                        <td style="border: 1px solid #2196F3"><?php echo $faculty->faculty_contact;?></td>
                                        <td style="border: 1px solid #2196F3">
                                            <i class="glyphicon glyphicon-pencil"></i>
                                        </td>
                                        <td style="border: 1px solid #2196F3">
                                            <i class="glyphicon glyphicon-remove-circle" style="color: red"></i>
                                        </td>
                                        <td style="border: 1px solid #2196F3">
                                            <input type="checkbox"  name="select" />
                                        </td>
                                    </tr>
                                    <?php $sr++;
                                } ?>
                                <tr>
                                    <td>
                                        <div class="form-group">
                                            <button type="submit" name="deleteMultipleBtn" class="btn btn-info">
                                                <i class="glyphicon glyphicon-remove-circle"> Delete</i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->

<?php include('footer.php');?>




