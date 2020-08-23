<?php include "../config/session_header.php"; ?>
<?php
$pageTitle = "Block Users  | Allenhouse Group of Colleges";
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
                            <i class="glyphicon glyphicon-saved"></i>
                            <h3 class="box-title">Saved Answres</h3>
                            <div class="pull-right box-tools">
                               <span>
                                   <img src="ownImages/other/gif_processing.gif" width="30" height="30">
                               </span>
                            </div>
                        </div> <hr/>
                        <?php
                        $students = $connection->query("SELECT fs.user_id,fs.student_roll,fu.user_email as student_email,fs.student_name,fs.student_contact,fc.course_name as student_course,fd.department_name as student_department, fs.student_year,fs.student_profile FROM forum_users fu left join forum_student fs on fu.id=fs.user_id left join forum_courses fc on fs.student_program=fc.id LEFT JOIN forum_departments fd on fs.student_department=fd.id WHERE fu.user_role = 'student'");

                        ?>

                        <div class="table-responsive">
                            <table class="table table-stripped" id="usersBlockUnblockTable">
                                <thead>
                                <tr style="background-color: #C51162;color: white">
                                    <th style="border: 1px solid #C51162;">Sr.</th>
                                    <th style="border: 1px solid #C51162;">Roll No.</th>
                                    <th style="border: 1px solid #C51162;">Name</th>
                                    <th style="border: 1px solid #C51162;">Program</th>
                                    <th style="border: 1px solid #C51162;">Branch</th>
                                    <th style="border: 1px solid #C51162;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $sr = 1 ;
                                  while ($student = $students->fetch_object()){ ?>
                                    <tr style="text-align: left;">
                                        <td style="border: 1px solid #C51162;"><?php echo $sr;?></td>
                                        <td style="border: 1px solid #C51162;"><?php echo $student->student_roll.$student->user_id;?></td>
                                        <td style="border: 1px solid #C51162;"><?php echo $student->student_name;?></td>
                                        <td style="border: 1px solid #C51162;"><?php echo $student->student_course;?></td>
                                        <td style="border: 1px solid #C51162;"><?php echo $student->student_department;?></td>
                                        <form id="blockUnblockUsers">
                                            <input type="hidden" name="userId" value="<?php echo base64_encode($student->user_id);?>"/>
                                            <input type="hidden" name="blocked_by" value="<?php echo base64_encode($_SESSION['userId']);?>"/>
                                            <td style="border: 1px solid #C51162;">
                                                <?php
                                                /* Check if the user is blocked or not */
                                                $checkBlocked = $connection->query("SELECT * FROM 
                                            forum_users WHERE id = '$student->user_id' AND user_status = '0' ")
                                                or die("Error in block".$connection->error);
                                                if ($checkBlocked->num_rows > 0){ ?>
                                                    <a href="#" onclick="blockUserById('<?php echo $student->user_id;?>','<?php echo $_SESSION['loginId'];?>','unblock',event);" id="unblockIt<?php echo $student->user_id;?>">
                                                        <i class="fa  fa-bell-slash"></i>
                                                    </a>
                                                <?php } else { ?>
                                               <a href="#" onclick="blockUserById('<?php echo $student->user_id;?>','<?php echo $_SESSION['loginId'];?>','block',event);" id="blockIt<?php echo $student->user_id;?>">
                                                   <i class="fa  fa-bell"></i>
                                               </a>
                                                <?php } ?>
                                                <a href="#" style="display: none;" onclick="blockUserById('<?php echo $student->user_id;?>','<?php echo $_SESSION['loginId'];?>','unblock',event);" id="unblockIt<?php echo $student->user_id;?>">
                                                    <i class="fa  fa-bell-slash"></i>
                                                </a>
                                                <a href="#" style="display: none;" onclick="blockUserById('<?php echo $student->user_id;?>','<?php echo $_SESSION['loginId'];?>','block',event);" id="blockIt<?php echo $student->user_id;?>">
                                                    <i class="fa  fa-bell"></i>
                                                </a>
                                                <img src="ownImages/other/ajax-loader.gif" id="blockUnblockLoader<?php echo $student->user_id;?>" style="display: none;">
                                                
                                            </td>
                                        </form>
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
<?php include('footer.php');?>

