<?php include "../config/session_header.php"; ?>
<?php
$pageTitle = "Receptionist Details | Admin | Allenhouse Group of Colleges";
include('header.php');

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
                            <i class="glyphicon glyphicon-education"></i>
                            <h3 class="box-title">Librarian</h3>
                            <div class="pull-right box-tools">
                               <span>
                                   <img src="ownImages/other/gif_processing.gif" width="30" height="30">
                               </span>
                            </div>
                        </div> <hr/>

                        <div class="table-responsive">
                            <table class="table table-stripped">
                                <thead>
                                <tr style="background-color:#FF9800 ;color: white;">
                                    <th style="border: 1px solid #FF9800;">Sr.</th>
                                    <th style="border: 1px solid #FF9800;">Name</th>
                                    <th style="border: 1px solid #FF9800;">Email</th>
                                    <th style="border: 1px solid #FF9800;">Contact</th>
                                    <th style="border: 1px solid #FF9800;">Edit</th>
                                    <th style="border: 1px solid #FF9800;">Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                $students = $connection->query("SELECT fl.*,fu.user_email AS librarianMail FROM `forum_librarian` fl LEFT JOIN forum_users fu on fl.user_id=fu.id ");
                                $sr = 1;
                                while ($student = $students->fetch_object() ){
                                    ?>
                                    <tr>
                                        <td style="border:1px solid #FF9800;"><?php echo $sr;?></td>
                                        <td style="border:1px solid #FF9800;"><?php echo $student->name;?></td>
                                        <td style="border:1px solid #FF9800;"><?php echo $student->librarianMail;?></td>
                                        <td style="border:1px solid #FF9800;"><?php echo $student->contact;?></td>
                                        <td style="border:1px solid #FF9800;"><i class="glyphicon glyphicon-pencil"></i> </td>
                                        <td style="border:1px solid #FF9800;color: red"><i class="glyphicon glyphicon-remove-circle"></i> </td>
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




