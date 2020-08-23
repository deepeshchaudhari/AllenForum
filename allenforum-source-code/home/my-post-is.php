<?php include "../config/session_header.php"; ?>
<?php include_once "functions/common/Common.php"; ?>

<?php
$pageTitle = "Post | Allenhouse Group of Colleges";
include('header.php');
?>


<?php
$activeTabDash = "active";
$activeLinkDash = "active";
include('sidebar.php');
$common = new CommonFunctions();
?>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-widget widget-user">
                    <div class="box-header">
                        <i class="glyphicon glyphicon-pencil"></i>
                        <h3 class="box-title">My Forum Posts <a href="write-posts.php"><i class="fa fa-plus-circle"></i></a> </h3>
                        <div class="pull-right box-tools">
                               <span>
                                   <img src="ownImages/other/gif_processing.gif" width="30" height="30">
                               </span>
                        </div>
                    </div>

                    <div class="box-footer">
                        <?php
                        if (isset($_GET['id']) && $_GET['id'] != '' && $_GET['id'] != null){
                            $post_id = base64_decode($_GET['id']);
                            $post = $common->getContributionPostAndAuthorDetails($connection,$post_id);
                            if ($post->num_rows > 0) {
                                $myposts = $post->fetch_object();
                                $post_title = $myposts->post_title;
                                $post_text = $myposts->post_text;
                                $posted_on = $myposts->posted_date;
                                $post_time = date('g : i A', strtotime($posted_on));
                                $post_date = date('d M,Y', strtotime($posted_on));
                                $posted_by = $myposts->post_author; //ID, find name*/
                            ?>
                            <div class="post">
                                <div class="user-block">
                                    <img class="img-circle img-bordered-sm" src="ownImages/other/blog-icon.png" alt="user image">
                                    <span class="username">
                                    <a href="my-posts-is.php?id=<?php echo base64_encode($myposts->post_id);?>"><?php echo $post_title;?></a>
                                 </span>
                                    <span class="description"> By <?php echo $posted_by;?> on <?php echo $post_date;?> - <?php echo $post_time;?></span>
                                    <p>
                                    <div>
                                        <?php echo $post_text;?>

                                    </div>
                                    <div class="text-right">
                                        <span>
                                            <a href="edit-my-post.php?id=<?php echo base64_encode($myposts->post_id);?>"><i class="glyphicon glyphicon-pencil" style="color: #eeaf35"></i></a>
                                        </span>
<!--                                          <span><a href="scripts/common/offcials/delete-my-post-script.php?id=--><?php //echo base64_encode($myposts->post_id);?><!--"><i class="glyphicon glyphicon-remove-circle" style="color: #ee2007"> </i> </a> </span>-->
                                    </div>
                                </div>
                            </div>
                        <?php
                            } else{
                                echo "<h2>No Posts Found !</h2>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include('footer.php');?>

