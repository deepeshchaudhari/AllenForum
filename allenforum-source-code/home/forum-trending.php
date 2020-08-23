<?php include "../config/session_header.php"; ?>
<?php include "functions/common/Common.php";?>
<?php
$pageTitle = "Trending | Allenhouse Group of Colleges";
include('header.php');
?>
<?php
$activeTabDash = "active";
$activeLinkDash = "active";
include('sidebar.php');
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
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-widget widget-user">
                    <div class="box-header">
                        <i class="glyphicon glyphicon-saved"></i>
                        <h3 class="box-title">Trending <i class="fa fa-fire"></i></h3>
                        <div class="pull-right box-tools">
                           <span>
                               <img src="ownImages/other/gif_processing.gif" width="30" height="30">
                           </span>
                        </div>
                    </div>
                    <div class="box-footer">
                        <div class="post">
                            <center><h4>Trending Board</h4></center>
                            <center>ALLEN FORUM STAR</center>
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
                                </div>
                                <hr/>
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
    </section>
</div>
<?php include('footer.php');?>