<?php include "../config/session_header.php"; ?>
<?php include_once "functions/common/Common.php";?>
<?php
$pageTitle = "Welcome in Dashboard | Allenhouse Group of Colleges";
include('header.php');?>
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
                        /* loop the posts from database */
                       $myposts = $common->getAllContributionPostsByUserId($connection,$_SESSION['userId']);
                       if ($myposts->num_rows > 0) {
                           while ($posts = $myposts->fetch_object()) {

                               $post_time = date('g : i A', strtotime($posts->posted_date));
                               $post_date = date('d M,Y', strtotime($posts->posted_date));
                               ?>
                               <div class="post">
                                   <div class="user-block">
                                       <img class="img-circle img-bordered-sm" src="ownImages/other/blog-icon.png"
                                            alt="user image">
                                       <span class="username">
                                            <a href="my-post-is.php?id=<?php echo base64_encode($posts->post_id); ?>"><?php echo $posts->post_title; ?></a>
                                         </span>
                                       <span class="description"> By <?php echo $posts->post_author; ?>
                                           on <?php echo $post_date; ?> - <?php echo $post_time; ?>
                                       </span>
                                       <p>
                                       <div>
                                           <?php echo substr($posts->post_text, 0, 300); ?>
                                           <span class="badge"><a href="my-post-is.php?id=<?php echo base64_encode($posts->post_id); ?>" style="color: white;">Read More</a></span>
                                       </div>
                                       <div class="text-right">
                                            <span><a href="edit-my-post.php?id=<?php echo base64_encode($posts->post_id); ?>"><i  class="glyphicon glyphicon-pencil" style="color: #28d0ee" title="Edit Your Post"></i> </a> </span>
                                           <!--                                    <span><a href="scripts/common/offcials/delete-my-post-script.php?id=-->
                                           <?php //echo base64_encode($posts->id);
                                           ?><!--" onclick="deletePost();"><i class="glyphicon glyphicon-remove-circle" style="color: #ee2007"> </i> </a> </span>-->
                                       </div>
                                   </div>
                               </div>
                               <?php
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

