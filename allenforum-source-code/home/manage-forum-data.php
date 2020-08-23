<?php include "../config/session_header.php"; ?>
<?php include "../config/configuration.php";?>
<?php include_once "functions/career/Career.php";?>


<?php
$pageTitle = "Manage Data | Allenhouse Group of Colleges";
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
                            <h3 class="box-title" id="title">Manage Data</h3>
                            <div class="pull-right box-tools" style="display: <?php if($_SESSION['userrole'] == 'admin') echo 'block'; else echo 'none';?>">
                                <a href="#" data-toggle="modal" data-target="#modalSampleSheerFormat"  title="Download Samples">
                                    Sample <img src="ownImages/other/right-arrow.png" width="40" height="40">
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="box box-widget widget-user">
                        <div class="box-footer">
                            <form id="manageDataWithSheetForm" class="form-horizontal">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="alert custome-alert-success" id="formSuccessMessage" style="display: none;"><b>Success! Sheet Upload</b> </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="inputname" class="col-sm-2 control-label">Type <span class="field-required">*</span> </label>
                                            <div class="col-sm-10">
                                                <select name="manageSheetTypeForUser" id="manageSheetTypeForUser" class="form-control">
                                                    <option value="">Select</option>
                                                    <option value="Student">Student</option>
                                                    <option value="Faculty">Faculty</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <label for="inputcolleges" class="col-sm-2 control-label">Sheet <span class="field-required">*</span></label>
                                            <div class="col-sm-10">
                                                <input type="file" name="manageSheetFile" id="manageSheetFile" onchange="validateDataManageFileUpload();" class="form-control" />
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-3"><br/>
                                        <input type="hidden" name="manageDataWithSheet" id="manageDataWithSheet" value="manageDataWithSheet">
                                        <button type="submit"  name="manageDataWithSheetBtn" id="manageDataWithSheetBtn" class="btn btn-primary btn-flat">
                                            <i class="fa fa-upload"></i> Upload</button>
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

<div class="modal fade" id="modalSampleSheerFormat" tabindex="-1" role="dialog" aria-labelledby="modalSampleSheerFormat">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="exampleModalLabel"><b>Sample CSV</b></h4>
            </div>
            <form id="answerRatingForm">
                <div class="modal-body">
                    <ul class="nav nav-stacked">
                        <li><a href="<?php echo '../'.SAMPLESHEET_BASEURL.'sample-student-sheet-format.csv'?>" target="_blank">Student Sheet <span class="pull-right badge bg-blue"><i class="fa fa-download"></i> </span></a></li>
                        <li><a href="<?php echo '../'.SAMPLESHEET_BASEURL.'sample-faculty-sheet-format.csv';?>" target="_blank">Faculty Sheet <span class="pull-right badge bg-aqua"><i class="fa fa-download"></i></span></a></li>
                        <li><a href="<?php echo '../'.SAMPLESHEET_BASEURL.'student-book-format.csv';?>" target="_blank">Library Sheet <span class="pull-right badge bg-green"><i class="fa fa-download"></i></span></a></li>
                    </ul>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-danger btn-flat" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?php include('footer.php');?>





