<?php include "../config/session_header.php"; ?>
<?php include_once "functions/faculty/Faculty.php";?>
<?php
$pageTitle = "Update Post  | Allenhouse Group of Colleges";
include('header.php');
$activeTabDash = "";
$activeLinkDash = "";
?>
<?php

$faculty = new Faculty();
if (isset($_GET['id']) && isset($_GET['postedby'])){
    $postId     = base64_decode($_GET['id']);
    $posted_by  = base64_decode($_GET['postedby']);
    $post = $faculty->getOfficialPostDetailByPostId($connection,$postId,$posted_by);

    if ($post->num_rows > 0) {
        $postDetails = $post->fetch_object();
        $postedFor = $postDetails->to_whome;
        $postTitle = $postDetails->subject;
        $postText = $postDetails->official_post;
    }

} else{
    header("Location:404.php");
}
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
                            <h3 class="box-title">Update Post</h3>
                            <div class="pull-right box-tools">
                               <span>
                                   <img src="ownImages/other/gif_processing.gif" width="30" height="30">
                               </span>
                            </div>
                        </div> <hr/>
                        <form  id="editpostOfficialForm">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <select name="postedFor" id="postedFor" class="form-control" >
                                                <option value="" >Select Authority</option>
                                                <option value="student" <?php if ($postedFor == "student") echo "selected";?>>Student</option>
                                                <option value="faculty" <?php if ($postedFor == "faculty") echo "selected";?>>Faculty</option>
                                                <option value="all" <?php if ($postedFor == "all") echo "selected";?>>All</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" name="officialPostTitle" id="officialPostTitle" value="<?php if ($postTitle) echo $postTitle;?>"  placeholder="Enter Post Title"  class="form-control"/>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="box-body pad">
                                <textarea name="officialPostText"  id="officialPostText"><?php if ($postText) echo $postText;?></textarea>
                                <script>
                                    CKEDITOR.replace( 'officialPostText' );
                                </script>
                            </div>
                            <div class="box-footer">
                                <div class="pull-right">
                                    <input type="hidden" name="editPostId" id="editPostId" value="<?php if ($_GET['id']) echo $_GET['id'];?>"  placeholder="Enter Post Title"  class="form-control"/>
                                    <button type="submit" name="editOfficialNoticeBtn" id="editOfficialNoticeBtn" class="btn btn-primary btn-flat"> Send <i class="fa fa-arrow-circle-right"></i> </button>
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




