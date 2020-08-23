<?php include "../config/session_header.php"; ?>
<?php
$pageTitle = "Edit Profile | Allenhouse Group of Colleges";
include('header.php');?>


<?php
$activeTabDash = "active";
$activeLinkDash = "active";
$activeTabAddBook = "";
$activeLinkAddBook = "";
$activeTabBook = "";
$activeLinkAddBookViewDelete = "";
$activeLinkUpdateBookStatus = "";

$activeTabManageStudents  = "";
$activeTabManageStudentsAdd = "";
$activeTabManageStudentsRemove = "";

$activeTabManageFaculty = "";
$activeTabManageFacultyAdd  = "";
$activeTabManageFacultyRemove = "";

$activeTabQuestions = "";
$activeTabAskQuestions = "";
$activeTabAnsGot = "";
$activeTabAskedQuestion = "";

$facultyForumTreeTab = "";
$facultyLetsAnsTab = "";

$activeTreeTabReception = "";
$addReceptionistLink = "";


$activeForumTreeTab = "";
$facultyLetsAnsTab = "";
$activeTabSavedAns = "";
$activeTabLetStart = "";




include('sidebar.php');?>
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
                            <h3 class="box-title">Upload Notes</h3>
                            <div class="pull-right box-tools">
                                   <span>
                                       <img src="ownImages/other/gif_processing.gif" width="30" height="30">
                                   </span>
                            </div>
                        </div>
                        <?php
                        /* find values of notes by Id from URL */
                        if (isset($_GET['notesId']) && $_GET['notesId'] !=''){
                            $notesId = base64_decode($_GET['notesId']);
                            $getNotes = $connection->query("SELECT * FROM  forum_notes_upload
                            WHERE id = '$notesId' ") or die("Something error:".$connection->error);
                            if ($getNotes->num_rows > 0){
                                $notesDetails = $getNotes->fetch_object();
                            } else{
                                header("Location:404.php");
                            }

                        } else{
                            header("Location:404.php");
                        }
                        ?>
                        <div class="box-footer">
                            <div class="post">
                                <div class="user-block">
                                    <form action="scripts/common/offcials/edit-notes-script.php" method="post"
                                          enctype="multipart/form-data" runat="server"
                                          onsubmit="ShowLoading()"
                                          class="form-horizontal">
                                        <?php if (isset($_SESSION['updateNotesStatus'])){ ?>
                                            <div class="text-center">
                                                <span class="badge"><?php echo $_SESSION['updateNotesStatus'];?></span>
                                            </div>
                                            <?php echo "<br/>";}
                                           unset($_SESSION['updateNotesStatus']);
                                         ?>
                                        <div class="box-body">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputname" class="col-sm-2 control-label">New File</label>
                                                        <div class="col-sm-10">
                                                            <input type="file" name="notes_file"   class="form-control" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputcolleges" class="col-sm-2 control-label">New Category</label>
                                                        <div class="col-sm-10">
                                                            <select name="notes_category"  class="form-control" required="required">
                                                                <option value="<?php echo $notesDetails->notes_category;?>" selected ><?php echo $notesDetails->notes_category;?></option>
                                                                <option value="computer">Computer</option>
                                                                <option value="electronics">Electronics</option>
                                                                <option value="mechanical">Mechanical</option>
                                                                <option value="civil">Civil</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="contact" class="col-sm-2 control-label">New Title</label>
                                                        <div class="col-sm-10">
                                                            <input type="text" name="notes_title" value="<?php echo $notesDetails->notes_title;?>" required placeholder="New Title" class="form-control"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="inputEmail3" class="col-sm-2 control-label"></label>
                                                        <input type="hidden" name="notesId" value="<?php echo base64_encode($notesDetails->id);?>"/>
                                                        <div class="col-sm-10">
                                                            <button type="submit" name="editNotesBtn" class="btn btn-primary">Update
                                                                <i class="fa fa-check"></i> </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
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