<?php include "../config/session_header.php"; ?>
<?php include_once "functions/common/Common.php";?>

<?php
$pageTitle = "Write Post | Allenhouse Group of Colleges";
include('header.php');?>


<?php
$activeTabDash = "active";
$activeLinkDash = "active";
include('sidebar.php');?>
<?php
$common = new CommonFunctions();
$courses = $common->getCourses($connection);
$departments = $common->getDepartments($connection);
?>

    <script type="text/javascript">
        function ShowLoading() {

            var editor = CKEDITOR.instances.postText.getData();

            if (editor == '') {
                alert('Post Field can not be empty ! ') ;
                return false ;
            }
            var div = document.createElement('div');
            var img = document.createElement('img');
            img.src = 'ownImages/library/loading1.gif';
            div.innerHTML = "Processing...<br />";
            div.style.cssText = 'position: fixed; top: 15%; left: 40%; z-index: 5000; width: 422px; text-align: center; ';
            div.appendChild(img);
            document.body.appendChild(div);
            return true;

        }
    </script>

    <!-- Content Wrapper. Contains page content (body)-->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box box-widget widget-user">
                        <div class="box-header">
                            <i class="glyphicon glyphicon-pencil"></i>
                            <h3 class="box-title">AllenForum Post</h3>
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                   <span>
                                       <img src="ownImages/other/gif_processing.gif" width="30" height="30">
                                   </span>
                            </div>
                        </div>
                        <form action="scripts/common/offcials/write-post-script.php" method="post" runat = "server" onsubmit="return ShowLoading();">
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <select name="departmemt" required class="form-control">
                                            <option value="">Select Department</option>
                                            <?php while ($department = $departments->fetch_object()){ ?>
                                                <option value="<?php echo $department->id;?>" ><?php echo $department->department_name;?></option>
                                            <?php } ?>
                                            <option value="n">ALL</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <input type="text" name="post_title" required placeholder="Enter Post Title" class="form-control"/>
                                    </div>
                                </div>
                            </div>
                            <div class="post">
                                <?php if (isset($_SESSION['adminDeleteStatus'])){?>
                                    <div class="text-center">
                                        <span class="badge">Admin Deleted Successfully !!</span>
                                    </div>
                                <?php } unset($_SESSION['adminDeleteStatus']) ?>
                                <div class="user-block">
                                    <div>
                                        <textarea name="postText" required id="postText"></textarea>
                                        <script>
                                            CKEDITOR.replace( 'postText' );

                                        </script>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group" style="float: right">
                                            <button type="submit" name="writePostBtn" class="btn btn-primary">
                                                Publish <i class="glyphicon glyphicon-flag"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                           </div>
                        </form>
                     </div>
                 </div>

            </div>
        </section>
    </div>

<?php include('footer.php');?>

<?php
/*
 * jQuery realted task is writen in footer.php
 * below thw jQuery script
 */

?>