<?php include "../config/session_header.php"; ?>
<?php include_once "functions/career/Career.php";?>
<?php
$pageTitle = "Companies | Allenhouse Group of Colleges";
include('header.php');
$activeTabDash = "active";
$activeLinkDash = "active";
include('sidebar.php');
$career = new Career();
$department = $career->getAllDepartment($connection);
?>
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

    <!-- Content Wrapper. Contains page content (body)-->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box box-widget widget-user">
                        <div class="box-header">
                            <i class="glyphicon glyphicon-saved"></i>
                            <h3 class="box-title">Company Information</h3>
                            <div class="pull-right box-tools">
                                   <span>
                                       <img src="ownImages/other/gif_processing.gif" width="30" height="30">
                                   </span>
                            </div>
                        </div>
                        <div class="box-footer">

                            <div class="post">
                                <div class="user-block">
                                    <form action="scripts/common/offcials/admin-add-company.php" method="post"
                                          enctype="multipart/form-data" runat="server"
                                          onsubmit="ShowLoading()"
                                          class="form-horizontal">
                                       <?php if (isset($_SESSION['uploadNotesStatus'])){ ?>
                                        <div class="text-center">
                                            <span class="badge"><?php echo $_SESSION['uploadNotesStatus'];?></span>
                                        </div>
                                       <?php echo "<br/>";}
                                       unset($_SESSION['uploadNotesStatus']);
                                       if (isset($_SESSION['deleteNotesStatus'])) { ?>
                                           <div class="text-center">
                                               <span class="badge"><?php echo $_SESSION['deleteNotesStatus']; ?></span>
                                           </div>
                                           <?php echo "<br/>";
                                       }
                                         unset($_SESSION['deleteNotesStatus']);
                                       if (isset($_SESSION['updateNotesStatus'])) { ?>
                                           <div class="text-center">
                                               <span class="badge"><?php echo $_SESSION['updateNotesStatus']; ?></span>
                                           </div>
                                           <?php echo "<br/>";
                                       } unset($_SESSION['updateNotesStatus']);
                                       ?>
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputname" class="col-sm-2 control-label">Company logo</label>
                                                        <div class="col-sm-10">
                                                            <input type="file" name="notes_file" required placeholder="Company logo" class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputcolleges" class="col-sm-2 control-label">Category</label>
                                                        <div class="col-sm-10">
                                                            <select name="notes_category"  class="form-control" required="required">
                                                                <option value="" selected disabled>Select</option>
                                                                <?php
                                                                while ($departments = $department->fetch_object()){ ?>
                                                                    <option value="<?php echo $departments->id;?>">
                                                                        <?php
                                                                        if ($departments->department_name == 'CSE') echo 'Computer Science & Engineering';
                                                                        elseif ($departments->department_name == 'EC') echo 'Electronics Engineering';
                                                                        elseif ($departments->department_name == 'ME') echo 'Mechanical Engineering';
                                                                        elseif ($departments->department_name == 'EN') echo 'Electrical & Electronics Engineering';
                                                                        elseif ($departments->department_name == 'CIVIL') echo 'Civil Engineering';
                                                                        elseif ($departments->department_name == 'BBA') echo 'Bachelor of Business Administration';
                                                                        elseif ($departments->department_name == 'BCA') echo 'Bachelor of Computer Application';?>
                                                                    </option>
                                                               <?php }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="contact" class="col-sm-2 control-label">Company Name</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="notes_title" required placeholder="Company Name" class="form-control"/>
                                                        </div>
                                                    </div>
                                                </div>
                                          
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="contact" class="col-sm-2 control-label"> Website</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="notes_website" required placeholder="Company URL, example cubersindia.com" class="form-control"/>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-2 control-label"></label>
                                                        <div class="col-sm-10">
                                                            <button type="submit" name="uploadNotesBtn" class="btn btn-primary btn-flat">Add Information
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="post">
                                <?php if (isset($_SESSION['adminDeleteStatus'])){?>
                                    <div class="text-center">
                                        <span class="badge">Admin Deleted Successfully !!</span>
                                    </div>
                                <?php } unset($_SESSION['adminDeleteStatus']) ?>
                                <div class="user-block">
                                    <div class="table-responsive">
                                        <table class="table table-stripped table-hover">
                                            <thead>
                                            <tr style="background-color: #2196F3;color: white;">
                                                <th>Sr.No</th>
                                                <th>Title</th>
                                                <th>Category</th>
                                                <th>Download</th>
                                                <th>Edit</th>
                                                <th>Delete</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <?php
                                            $sr = 1;
                                            $uploadFile = $connection->query("SELECT * FROM  forum_company 
                                             WHERE user_id = '".$_SESSION['userId']."'  ")
                                            or die("Error in Notes Upload".$connection->error);
                                            while ($uploadedFiles = $uploadFile->fetch_object() ) { ?>
                                                <tr>
                                                    <td><?php echo $sr;?></td>
                                                    <td><?php echo $uploadedFiles->company_name;?></td>
                                                    <td><?php echo $uploadedFiles->company_branch;?></td>
                                                    <td><a href="<?php echo $uploadedFiles->company_logo;?>"><i class="glyphicon glyphicon-download-alt"></i> </a> </td>
                                                    <td><?php echo $uploadedFiles->company_website;?></td>
                                                    <td><?php echo $uploadedFiles->entry_time;?></td>
                                                    
                                                </tr>
                                            <?php $sr++; } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
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


