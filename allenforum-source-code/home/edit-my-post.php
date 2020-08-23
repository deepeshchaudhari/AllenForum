<?php include "../config/session_header.php"; ?>
<?php
$pageTitle = "Edit Profile | Allenhouse Group of Colleges";
include('header.php');?>


<?php
$activeTabDash = "active";
$activeLinkDash = "active";
include('sidebar.php');?>

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



    <div class="content-wrapper">
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
                        <?php
                        /* get the id of post from url */
                        if (isset($_GET['id']) && $_GET['id'] != '' && $_GET['id'] != null){
                            $post_id  = base64_decode($_GET['id']);
                            $checkPost = $connection->query("SELECT * FROM  forum_contribution_post WHERE id = '$post_id' ")
                            or die("Post not founf and error:".$connection->error);
                            if ($checkPost->num_rows > 0 ){
                                $findPost = $connection->query("SELECT * FROM  forum_contribution_post WHERE id = '$post_id' " )->fetch_object()
                                or die("Post data not found".$connection->error);

                        ?>
                        <form action="scripts/common/offcials/edit-post-script.php" method="post" runat = "server" onsubmit="return ShowLoading();">
                            <div class="box-footer">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="hidden" name="post_id" value="<?php echo base64_encode($findPost->id);?>"/>
                                            <input type="text" name="post_title" required value="<?php echo $findPost->post_title;?>" placeholder="Enter Post Title" class="form-control"/>
                                        </div>
                                    </div>
                                </div>
                                <div class="post">
                                    <div class="user-block">
                                        <div>
                                            <textarea name="postText" required id="postText"><?php echo $findPost->post_text;?></textarea>
                                            <script>
                                                CKEDITOR.replace( 'postText' );

                                            </script>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12">
                                            <div class="form-group" style="float: right">
                                                <button type="submit" name="editPostBtn" class="btn btn-primary">
                                                    Publish <i class="glyphicon glyphicon-flag"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <?php
                             } else{
                                echo "<h2 class='text-center'>Post Not Found !</h2>";
                            }
                        }?>
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