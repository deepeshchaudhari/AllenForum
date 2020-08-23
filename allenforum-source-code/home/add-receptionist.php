<?php include "../config/session_header.php"; ?>
<?php
$pageTitle = "Add Receptionist | Admin | Allenhouse Group of Colleges";
// $pageFor = "librarian";
include('header.php');?>

<?php  $activeTabDash = "";
$activeLinkDash = "";
$activeTabBook = "";

include('sidebar.php');?>

<!-- Content Wrapper. Contains page content (body)-->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <script type="text/javascript">
        function ShowLoading(e) {
            var div = document.createElement('div');
            var img = document.createElement('img');
            img.src = 'ownImages/library/loading1.gif';
            div.innerHTML = "Processing...<br />";
            div.style.cssText = 'position: fixed; top: 15%; left: 40%; z-index: 5000; width: 422px; text-align: center; ';
            div.appendChild(img);
            document.body.appendChild(div);
            return true;
            // These 2 lines cancel form submission, so only use if needed.
            //window.event.cancelBubble = true;
            //e.stopPropagation();
        }
    </script>



    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title"><a href="dashboard.php"><i class="fa  fa-arrow-left">      Dashboard</i></a></h3>
                    </div>
                    <div class="box-body">
                        <?php
                        if (isset($_GET['status'])){
                            if ($_GET['status'] == 'success'){ ?>
                                <div class="alert custome-alert-success alert-dismissible">
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                                    <span><i class="icon fa fa-check"></i> Success alert preview. This alert is dismissable.</span>
                                </div>
                            <?php }
                        }
                        ?>

                        <form id="addReceptionistForm">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="alert custome-alert-success" id="formSuccessMessage" style="display: none;">Success! Recepetionist Added </div>

                                </div>
                                <div class="col-md-3">
                                    <label>Name <span class="field-required">*</span> </label>
                                    <input type="text" name="receptionist_name" id="receptionist_name" class="form-control" placeholder="Receptionist Name" required>
                                </div>
                                <div class="col-md-3">
                                    <label>Email <span class="field-required">*</span></label>
                                    <input type="text" name="receptionist_email" id="receptionist_email" class="form-control" placeholder="Receptionist Email" required>
                                </div>
                                <div class="col-md-3">
                                    <label>Password <span class="field-required">*</span></label>
                                    <input type="text" name="receptionist_pass" id="receptionist_pass" class="form-control" placeholder="Create Password" required>
                                </div>

                                <div class="col-md-3">
                                    <label>Contact <span class="field-required">*</span></label>
                                    <input type="number" name="receptionist_contact" id="receptionist_contact" class="form-control" placeholder="Phone/Contact" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Department <span class="field-required">*</span></label>
                                    <select name="receptionist_department" id="receptionist_department"  class="form-control" required="required">
                                        <option value="" selected disabled>--SELECT DEPARTMENT--</option>
                                        <option value="receptionist">Receptionist</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3"><br/>
                                    <button type="submit"  name="addReceptionistBtn" id="addReceptionistBtn" class="btn btn-primary">
                                        <i class="fa fa-check-circle"></i> Add Receptionist</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="content" style="display: none;">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">
                            <i class="glyphicon glyphicon-grain"></i>
                            Receptionist
                        </h3>
                    </div>
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example2" class="table small table-bordered table-hover ">
                                <thead>
                                <tr style="background-color: deepskyblue;color:white;">
                                    <th>Name</th>
<!--                                    <th>Profile</th>-->
                                    <th>Email</th>
                                    <th>Password</th>
                                    <th>Role</th>
<!--                                    <th>Edit</th>-->
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                /*
                                 * Display the receptionist information
                                 * added by admin
                                 */
                              //  $receptionist = $connection->query("SELECT * FROM forum_users WHERE role = 'receptionist' ")
                             //   or die("some error in query".$connection->error);
                              //  ;
                              //  while ($receptionistInfo = $receptionist->fetch_object() ){?>
<!--                                    <tr>-->
<!--                                        <td>--><?php //echo $receptionistInfo->name;?><!--</td>-->
<!--<!--                                        <td><img src="-->--><?php ////(($receptionistInfo->profile_pic)?$receptionistInfo->profile_pic:'ownImages/reception/profile/default_receptionist.png');?><!--<!--" width="50" height="50" class="img-circle"/></td>-->-->
<!--                                        <td>--><?php //echo $receptionistInfo->user_email;?><!--</td>-->
<!--                                        <td>--><?php //echo $receptionistInfo->user_pass;?><!--</td>-->
<!--                                        <td>--><?php //echo $receptionistInfo->role;?><!--</td>-->
<!--<!--                                        <td><a href=""><i class="glyphicon glyphicon-pencil"></i></a> </td>-->-->
<!--                                        <td><a href="scripts/admin/delete-receptionist-script.php?id=--><?php //echo base64_encode($receptionistInfo->user_id);?><!--"><i class="glyphicon glyphicon-remove"></i> </a> </td>-->
<!--                                    </tr>-->
                                <?php// } ?>
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
