<?php include "../config/session_header.php"; ?>
<?php
$pageTitle = "Feedbacks | Admin | Allenhouse Group of Colleges";
include('header.php');?>

<?php  $activeTabDash = "";
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
                            <i class="glyphicon glyphicon-education"></i>
                            <h3 class="box-title">Students</h3>
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
                                    <th style="border: 1px solid #009688;">Feedback Title</th>
                                    <th style="border: 1px solid #009688;">Feedback</th>
                                    <th style="border: 1px solid #009688;">Branch</th>
                                    <th style="border: 1px solid #009688;">Time</th>
                                    
                                   <!--  <th style="border: 1px solid #009688;">Edit</th>
                                    <th style="border: 1px solid #009688;">Delete</th> -->
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                $students = $connection->query("SELECT * FROM forum_feedback "); // find q_id
                                $sr = 1;
                                while ($student = $students->fetch_object() ){
                                    ?>
                                    <tr>
                                        <td style="border:1px solid #009688"><?php echo $sr;?></td>
                                        <td style="border:1px solid #009688"><?php echo $student->roll_no;?></td>
                                        <td style="border:1px solid #009688"><?php echo $student->feedback_title;?></td>
                                        <td style="border:1px solid #009688"><?php echo $student->feedback;?></td>
                                        <td style="border:1px solid #009688"><?php echo $student->department;?></td>
                                        <td style="border:1px solid #009688"><?php echo $student->feedback_time;?></td>
                                    
                                        <!-- <td style="border:1px solid #009688"><i class="glyphicon glyphicon-pencil"></i> </td>
                                        <td style="border:1px solid #009688;color: red"><i class="glyphicon glyphicon-remove-circle"></i> </td> -->
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
<!-- /.content-wrapper -->

<?php include('footer.php');?>




