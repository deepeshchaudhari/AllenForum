<?php include "../config/session_header.php"; ?>
<?php
$pageTitle = "Official Post  | Allenhouse Group of Colleges";
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
                            <i class="fa  fa-commenting"></i>
                            <h3 class="box-title">Official Post</h3>
                            <div class="pull-right box-tools">
                               <span>
                                   <img src="ownImages/other/gif_processing.gif" width="30" height="30">
                               </span>
                            </div>
                        </div> <hr/>
                        <form  id="addpostOfficialForm">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <select name="postedFor" id="postedFor" class="form-control" >
                                                <option value="" >Select Authority</option>
                                                <option value="student">Student</option>
                                                <option value="faculty">Faculty</option>
                                                <option value="all">All</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="officialPostTitle" id="officialPostTitle"  placeholder="Enter Post Title"  class="form-control"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-body pad">
                                <textarea name="officialPostText"  id="officialPostText"></textarea>
                                <script>
                                    CKEDITOR.replace( 'officialPostText' );
                                </script>
                            </div>
                            <div class="box-footer">
                                <div class="pull-right">
                                    <button type="submit" name="addOfficialNoticeBtn" id="addOfficialNoticeBtn" class="btn btn-primary btn-flat"> Send <i class="fa fa-arrow-circle-right"></i> </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->

<?php include('footer.php');?>




