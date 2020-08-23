<?php include "../config/session_header.php"; ?>
<?php
$pageTitle = "Welcome in Dashboard | Allenhouse Group of Colleges";
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

$activeForumTreeTab = "";
$activeTabSavedAns = "";
$activeTabLetStart = "";

$activeTreeTabReception = "";
$addReceptionistLink = "";




include('sidebar.php');?>
<?php
/*  Get the ID Of the post from URL, for single post of offcials */
if (isset($_GET['id'])){
    $postId = base64_decode($_GET['id']);
    /* find this post by id */
    $getPost = $connection->query("SELECT * FROM forum_officials_post 
     WHERE id =  '$postId' ") or die("unable to get the post".$connection->error);

    if ($getPost->num_rows > 0){
        $postDetails = $getPost->fetch_object();
    } else{
        header("Location:404.php");
    }

} else{
    header("Location:404.php");
}
?>

    <!-- Content Wrapper. Contains page content (body)-->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box box-widget widget-user">
                        <div class="box-footer">
                            <div class="post">
                                <div class="box-header">
                                    <i class="glyphicon glyphicon-saved"></i>
                                    <h3 class="box-title"><?php echo $postDetails->subject;?></h3>
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                   <span>
                                       <img src="ownImages/other/gif_processing.gif" width="30" height="30">
                                   </span>
                                    </div>
                                </div>


                                <img src="ownImages/other/blue-line-separator.png" width="100%" height="1"/>

                                <p><?php echo $postDetails->official_post;?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

<?php include('footer.php');?>

