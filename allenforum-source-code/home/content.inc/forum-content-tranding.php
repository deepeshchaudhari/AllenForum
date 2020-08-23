<?php
$common = new CommonFunctions();
/*
$userId = $_SESSION['userId'];
$contribution_post = $common->getContributionPost($connection,$userId);
if ($contribution_post){
    $contribution_postCount = $contribution_post->num_rows;
}

$follower = $common->getFollowerByUser($connection,$userId);
if ($follower){
    $followerCount = $follower->num_rows;
}
$rates = $common->getTotalRatesOfAnwersByUserId($connection,$userId);
$row = $rates->fetch_object();
$total_rate = $row->total_rate;

$totalLikes = $common->getTotalLikeOnQuesByUserId($connection,$userId);
$like = $totalLikes->fetch_object();
$totalLikesCount = $like->total_likes; */

?>


    <?php
    /*
     * Calculate the same data of all students
     */
    $count = $common->getAllStudentCount($connection);
    if ($count->num_rows > 0) {
        $sr = 1;
        $trending = 0;
        while ($student = $count->fetch_object()) {
            $studentId = $student->id;
            $studentLoginId = $student->user_id;
            $studentRole = $student->user_role;

            $totalLikess = $common->getTotalLikeOnQuesByAllUserId($connection, $studentId);
            $like = $totalLikess->fetch_object();
            $totalLikesCount = $like->total_likes;

            $contribution_post = $common->getAllContributionPostByUsersId($connection, $studentId,$studentRole);
            if ($contribution_post) {
                $contribution_postCount = $contribution_post->num_rows;
            }

            $follower = $common->getAllFollowerByUsersId($connection, $studentId,$studentRole);
            if ($follower) {
                $followerCount = $follower->num_rows;
            }

            $rates = $common->getTotalRatesOfAnwersByAllUsersId($connection, $studentId,$studentRole);
            $row = $rates->fetch_object();
            $total_rate = $row->total_rate;

            $totalCoins = 10 * $followerCount + 1 * $totalLikesCount + 1 * $total_rate + 5 * $contribution_postCount;
            if ($trending == 0) {
                $saveTrending = $common->saveTrendingData($connection, $studentId, $totalLikesCount, $contribution_postCount, $followerCount, $total_rate, $totalCoins);
            }
            $sr++;

        }
    }

    ?>

<?php
/* get top trendings */
//$common = new CommonFunctions();
$topTrending = $common->getTopTrending($connection);
if ($topTrending->num_rows > 0) {
    $toppers = array();
    while ($row = $topTrending->fetch_object()) {
        $data[] = $row;
    }
    for ($i = 0; $i < 3; $i++) {
        $toppers[] = $data[$i];
    }
    for ($j = $i; $j < $topTrending->num_rows; $j++) {
        $remaining[] = $data[$j];
    }

    $first = $toppers[0];

    $firstToperName = $first->trendingName;
    $firstToperProfile = $first->trendingProfile;
    $firstToperRating = $first->rating;
    $firstToperCoins = $first->coins;

    $second = $toppers[1];
    $secondToperName = $second->trendingName;
    $secondToperProfile = $second->trendingProfile;
    $secondToperRating = $second->rating;
    $secondToperCoins = $second->coins;

    $third = $toppers[2];
    $thirdToperName = $third->trendingName;
    $thirdToperProfile = $third->trendingProfile;
    $thirdToperRating = $third->rating;
    $thirdToperCoins = $third->coins;
}
?>

<div class="row">
    <div class="col-lg-12">
        <div class="box box-widget widget-user">
            <div class="box-footer">
                <div class="post">
                    <center><h4>Trending Board</h4></center>
                    <center>ALLEN FORUM STAR</center><br/>
                    <?php if ($topTrending->num_rows >=3){ ?>
                    <div class="top-trending">
                        <div class="row">
                            <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                                <img src="<?php if ($secondToperProfile) {echo '../'.SPROFILE_BASEURL.$secondToperProfile;} else{ echo DEFAULT_TRENDING_PIC;} ?>" class="img-circle" width="80" height="80" >
                                <div class="knob-label"><?php echo $secondToperName;?></div>
                                <div class="knob-label" style="color: #ffbf20;"><b><?php echo $secondToperCoins;?></b></div>
                                <div class="knob-label" >
                                    <img src="ownImages/trending/silver.png" title="Second Trending Star"/>
                                </div>
                            </div>
                            <div class="col-xs-4 text-center" style="border-right: 1px solid #f4f4f4">
                                <img src="<?php if ($firstToperProfile) {echo '../'.SPROFILE_BASEURL.$firstToperProfile;} else{ echo DEFAULT_TRENDING_PIC;} ?>" class="img-circle img-bordered" width="80" height="80">
                                <div class="knob-label"><?php echo $firstToperName;?></div>
                                <div class="knob-label" style="color: #ffbf20;"><b><?php echo $firstToperCoins;?></b></div>
                                <div class="knob-label" >
                                    <img src="ownImages/trending/gold.png" title="First Trending Star"/>
                                </div>
                            </div>
                            <div class="col-xs-4 text-center">
                                <img src="<?php if ($thirdToperProfile) {echo '../'.SPROFILE_BASEURL.$thirdToperProfile;} else{ echo DEFAULT_TRENDING_PIC;} ?>" class="img-circle" width="80" height="80">
                                <div class="knob-label"><?php echo $thirdToperName;?></div>
                                <div class="knob-label" style="color: #ffbf20;"><b><?php echo $thirdToperCoins;?></b></div>
                                <div class="knob-label" >
                                    <img src="ownImages/trending/bronze.png" title="Third Trending Star"/>
                                </div>
                            </div>
                        </div>  <hr/>
                            <span><b>Rankings</b></span><br/><br/>
                            <?php  foreach ($remaining as $remaingUsers) {  ?>
                                <div class="box-comment">
                                    <img  src="<?php if ($remaingUsers->trendingProfile) {echo '../'.SPROFILE_BASEURL.$remaingUsers->trendingProfile;} else{ echo DEFAULT_TRENDING_PIC;}?>" class="img-circle img-sm" alt="User Image">
                                    <div class="comment-text">
                                      <span class="username" style="padding-left: 10px;">
                                        <?php echo $remaingUsers->trendingName;?><br/>
                                          &nbsp;&nbsp;&nbsp;&nbsp;<i style="color: #40ecff" title="Rating">#<?php echo $remaingUsers->rating;?></i>
                                        <span class="text-muted pull-right">
                                           <img src="ownImages/other/ranking.PNG" class="img-circle" width="10" height="10" title="Coins"/> <span><?php echo $remaingUsers->coins;?></span>
                                        </span>
                                          <?php if($remaingUsers->user_id == $_SESSION['userId']) { echo '(Your Rank)';} ?>
                                      </span>
                                    </div>
                                    <img src="ownImages/other/line.png" width="100%" height="1"/>
                                </div>
                            <?php } ?>
                        </div>
                    <?php } else{
                        echo "<br/><center><span class='badge'>Data is not available for analysis !</span></center>";
                    }?>
                </div>
            </div>
        </div>
    </div>
</div>

