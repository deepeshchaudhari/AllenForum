<?php
include_once "functions/common/Common.php";
$common = new CommonFunctions();
$aciveUsers = $common->getActiveUsers($connection,$_SESSION['loginId']);
?>

<?php
/* get top trendings */
$topTrending = $common->getTopTrending($connection);
if ($topTrending->num_rows > 0) {
    $toppers = array();
    while ($row = $topTrending->fetch_object()) {
        $data[] = $row;
    }
    for ($i = 0; $i < 3; $i++) {
        $toppers[] = @$data[$i];
    }
    for ($j = $i; $j < $topTrending->num_rows; $j++) {
        $remaining[] = @$data[$j];
    }

    $first = $toppers[0];
    if ($first) {
        $firstToperName = $first->trendingName;
        $firstToperProfile = $first->trendingProfile;
        $firstToperRating = $first->rating;
        $firstToperCoins = $first->coins;
    }

    $second = $toppers[1];
    if ($second) {
        $secondToperName = $second->trendingName;
        $secondToperProfile = $second->trendingProfile;
        $secondToperRating = $second->rating;
        $secondToperCoins = $second->coins;
    }

    $third = $toppers[2];
    if ($third) {
        $thirdToperName = $third->trendingName;
        $thirdToperProfile = $third->trendingProfile;
        $thirdToperRating = $third->rating;
        $thirdToperCoins = $third->coins;
    }
}

?>
<aside class="control-sidebar control-sidebar-dark">
    <ul class="nav nav-tabs nav-justified control-sidebar-tabs">
        <li><a href="#control-sidebar-home-tab" data-toggle="tab"><i class="glyphicon glyphicon-fire"></i></a></li>
        <li><a href="#control-sidebar-users-tab" data-toggle="tab"><i class="fa fa-users"></i></a></li>
        <li><a href="#control-sidebar-settings-tab" data-toggle="tab"><i class="fa fa-gears"></i></a></li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" id="control-sidebar-users-tab">
            <h3 class="control-sidebar-heading">Active Users</h3>
            <h4>Online(<?php echo $aciveUsers->num_rows;?>)</h4>
            <ul class="control-sidebar-menu">
                <?php

                while ($user = $aciveUsers->fetch_object()) {
                    $userId = $user->id;
                    $userRole = $user->user_role;
                    if ($userRole == "student") {
                        $query2 = "SELECT fs.student_name as activeUsername,fs.student_profile as activeUserProfile FROM forum_student fs where fs.user_id='$userId' ";
                    } else if ($userRole == "faculty") {
                        $query2 = "SELECT ff.name as activeUsername,ff.profile as activeUserProfile FROM forum_faculty ff where ff.user_id='$userId' ";
                    }
                    else if ($userRole == "admin") {
                        $query2 = "SELECT fa.name as activeUsername,fa.profile as activeUserProfile FROM forum_admin fa where fa.user_id='$userId' ";
                    }
                    else if ($userRole == "librarian") {
                        $query2 = "SELECT fl.name as activeUsername,fl.profile as activeUserProfile FROM forum_librarian fl where fl.user_id='$userId' ";
                    }
                    else if ($userRole == "receptionist") {
                        $query2 = "SELECT fc.name as activeUsername,fc.profile as activeUserProfile FROM forum_receptionist fc where fc.user_id='$userId' ";
                    }
                    $query2Result = $connection->query($query2);
                    if ($query2Result->num_rows > 0) {
                        $userDetails = $query2Result->fetch_object();
                        ?>
                        <li>
                            <a href="javascript:void(0)">
                                <span><img src="<?php if ($userDetails->activeUserProfile) { echo '../' . SPROFILE_BASEURL . $userDetails->activeUserProfile;} else {echo DEFAULT_USER_PIC;} ?>" class="img-circle" width="35" height="35"/></span>
                                <span style="color:white;padding: 6px;"><?php echo $userDetails->activeUsername; ?></span>
                                <span><img src="ownImages/other/user-active.PNG" class="img-circle" width="10" height="10"/></span>
                            </a>
                        </li>
                    <?php }
                     }
                ?>
            </ul>
        </div>

        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
            <h3 class="control-sidebar-heading">Tranding</h3>
            <?php
            if ($topTrending->num_rows >= 3){
            ?>
            <ul class="control-sidebar-menu">
                <li>
                    <a href="javascript:void(0)">
                        <span><img src="<?php if (isset($firstToperProfile)) {echo '../'.SPROFILE_BASEURL.$firstToperProfile;} else{ echo DEFAULT_USER_PIC;} ?>" class="img-circle" width="35" height="35"/></span>
                        <span style="color:white;padding: 6px;"><?php if ($firstToperName) echo $firstToperName;?></span>
                    </a>
                </li>

                <li>
                    <a href="javascript:void(0)">
                        <span><img src="<?php if (isset($secondToperProfile)) {echo '../'.SPROFILE_BASEURL.$secondToperProfile;} else{ echo DEFAULT_USER_PIC;} ?>" class="img-circle" width="35" height="35"/></span>
                        <span style="color:white;padding: 6px;"><?php if (isset($secondToperName)) echo $secondToperName;?></span>
                    </a>
                </li>

                <li>
                    <a href="javascript:void(0)">
                        <span><img src="<?php if (isset($thirdToperProfile)) {echo '../'.SPROFILE_BASEURL.$thirdToperProfile;} else{ echo DEFAULT_USER_PIC;} ?>" class="img-circle" width="35" height="35"/></span>
                        <span style="color:white;padding: 6px;"><?php if (isset($thirdToperName)) echo $thirdToperName ;?></span>
                    </a>
                </li>
            </ul>
            <?php } ?>
            <!-- /.control-sidebar-menu -->
        </div>
        <!-- /.tab-pane -->



        <!-- Stats tab content -->
        <div class="tab-pane" id="control-sidebar-stats-tab">Stats Tab Content</div>
        <!-- Settings tab content -->
        <div class="tab-pane" id="control-sidebar-settings-tab">
            <form method="post">
                <h3 class="control-sidebar-heading">General Settings</h3>
                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Report panel usage
                        <input type="checkbox" class="pull-right" checked>
                    </label>
                    <p>
                        Some information about this general settings option
                    </p>
                </div>
                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Allow mail redirect
                        <input type="checkbox" class="pull-right" checked>
                    </label>
                    <p>
                        Other sets of options are available
                    </p>
                </div>
                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Expose author name in posts
                        <input type="checkbox" class="pull-right" checked>
                    </label>
                    <p>
                        Allow the user to show his name in blog posts
                    </p>
                </div>
                <h3 class="control-sidebar-heading">Chat Settings</h3>
                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Show me as online
                        <input type="checkbox" class="pull-right" checked>
                    </label>
                </div>
                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Turn off notifications
                        <input type="checkbox" class="pull-right">
                    </label>
                </div>
                <div class="form-group">
                    <label class="control-sidebar-subheading">
                        Delete chat history
                        <a href="javascript:void(0)" class="text-red pull-right"><i class="fa fa-trash-o"></i></a>
                    </label>
                </div>
            </form>
        </div>
        <!-- /.tab-pane -->
    </div>
</aside>