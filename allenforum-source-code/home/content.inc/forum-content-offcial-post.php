<?php
$faculty = new Faculty();
$post_official = $faculty->getAllOfficialPosts($connection);
if ($post_official->num_rows > 0) {
    while ($posts = $post_official->fetch_object()) {
        $postId = $posts->id;
        $posted_by = $posts->posted_by; // this is the ID
        $title = $posts->subject;
        $shared_with = $posts->to_whome;
        if ($shared_with == 'all') {
            $shared_with = 'Shared Publicaly';
        } else {
            $shared_with = "Shared With " . $posts->to_whome;
        }
        /* also Display the date and time as wel */
        $time = date('g : i A', strtotime($posts->date_time));
        $date = date('d M,Y', strtotime($posts->date_time));

        ?>
        <div class="post">
            <div class="user-block">
                <img class="img-circle img-bordered-sm" src="ownImages/other/allenlogo.png" alt="user image">
                <img class="img-circle img-bordered-sm"
                     src="<?php if ($posts->profile) echo $posts->profile; else echo 'ownImages/other/user.png' ?>"
                     alt="user image">
                <span class="username">
               <a href="#"><?php echo strtoupper($posts->name); ?></a>
            </span>
                <span class="description"> <?php echo strtoupper($shared_with); ?>: <?php echo $date . " - " . $time; ?> </span>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="official-post-title">
                            <a href="read-more-offcials-post.php?id=<?php echo base64_encode($postId) . "&unique=" . uniqid(); ?>"><?php echo $title; ?></a>
                        </div>
                        <?php if ($_SESSION['userrole'] == 'faculty' && $_SESSION['userId'] == $posts->posted_by) { ?>
                            <div class="official-post-edit">
                                <a href="edit-official-post.php?id=<?php echo base64_encode($postId) . "&postedby=" . base64_encode($posted_by) . "&unique=" . sha1(uniqid()); ?>"
                                   title="Edit Notice">
                                    <i class="glyphicon glyphicon-pencil icon fa-1x"></i>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                </div>
                <?php echo substr($posts->official_post, 0, 250); ?>
                <span style="font-weight: bolder;color: teal">
                   <a href="read-more-offcials-post.php?id=<?php echo base64_encode($postId) . "&unique=" . sha1(uniqid()); ?>">
                        || Read More<i class="glyphicon glyphicon-menu-right"></i>
                           </a>
                </span>
            </div>
        </div>
    <?php }
}

?>


                    