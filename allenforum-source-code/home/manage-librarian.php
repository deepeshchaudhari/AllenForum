<?php include "../config/session_header.php"; ?>
<?php include "../config/configuration.php";?>
<?php include_once "functions/career/Career.php";?>


<?php
$pageTitle = "Shared Questions | Allenhouse Group of Colleges";
include('header.php');?>

<?php
$activeTabDash = "";
$activeLinkDash = "";
$career = new Career();
$department = $career->getAllDepartment($connection);
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
                            <h3 class="box-title" id="companytitle">Add Librarian</h3>
                            <div class="pull-right box-tools" style="display: <?php if($_SESSION['userrole'] == 'admin') echo 'block'; else echo 'none';?>">
                                <a href="#"  title="View Librarian">
                                    <img src="ownImages/other/right-arrow.png" width="40" height="40">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="box box-widget widget-user">
                        <div class="box-footer">
                            <form id="addEditLibrarianForm">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert custome-alert-success" id="formSuccessMessage" style="display: none;">Success! Librarian Added </div>

                                    </div>
                                    <div class="col-md-3">
                                        <label>Name <span class="field-required">*</span> </label>
                                        <input type="text" name="librarian_name" id="librarian_name" class="form-control" placeholder="Librarian Name"/>
                                    </div>
                                    <div class="col-md-3">
                                        <label>Email <span class="field-required">*</span></label>
                                        <input type="text" name="librarian_email" id="librarian_email" class="form-control" placeholder="Librarian Email" />
                                    </div>
                                    <div class="col-md-3">
                                        <label>Password <span class="field-required">*</span></label>
                                        <input type="text" name="librarian_pass" id="librarian_pass" class="form-control" placeholder="Create Password" />
                                    </div>

                                    <div class="col-md-3">
                                        <label>Contact <span class="field-required">*</span></label>
                                        <input type="number" name="librarian_contact" id="librarian_contact" class="form-control" placeholder="Phone/Contact" />
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3">
                                        <label>Department <span class="field-required">*</span></label>
                                        <select name=librarian_department" id="librarian_department"  class="form-control"/>
                                            <option value="" >--SELECT DEPARTMENT--</option>
                                            <option value="librarian">Librarian</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-3"><br/>
                                        <input type="hidden" id="manageLibrarianAction" name="manageLibrarianAction" value="add" />
                                        <button type="submit"  name="addEditLibrarianBtn" id="addEditLibrarianBtn" class="btn btn-primary">
                                            <i class="fa fa-check-circle"></i> Add Librarian</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include ('modals/career/modal-add-company-info.php');?>
<?php include('footer.php');?>
<script type="text/javascript">
    window.onload = function() {
        getCompanyList();
    };
</script>




