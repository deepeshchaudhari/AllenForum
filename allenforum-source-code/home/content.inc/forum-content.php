<div  class="row">
    <?php

    if (isset($_GET['home'])){
        $homeTab = $_GET['home'];// active
        $TimeLineTab = "";
        $noisTab = "";
        $settingTab = "";
        $collegeTab = "";
        $activityTab = "";
    }
   else if (isset($_GET['timeline'])) {
       $homeTab = "";
       $TimeLineTab = $_GET['timeline']; //active
       $noisTab = "";
       $settingTab = "";
       $collegeTab = "";
       $activityTab = "";
   }
   else if (isset($_GET['college_post'])) {
       $homeTab = "";
       $TimeLineTab = ""; //active
       $noisTab = "";
       $settingTab = "";
       $collegeTab = $_GET['college_post'];
       $activityTab = "";
   }
    else if (isset($_GET['myactivity'])){
        $homeTab = "";
        $TimeLineTab = ""; //active
        $noisTab = "";
        $settingTab = "";
        $collegeTab = "";
        $activityTab = $_GET['myactivity'];

   }else{
        header("Location:../home/404.php");
    }
    ?>
    <div class="col-md-12">
        <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
                <li class="<?php echo $homeTab;?>"><a href="#activityHome" data-toggle="tab">
                        <i class="glyphicon glyphicon-home" ></i> Home </a></li>
                <li class="<?php echo $collegeTab;?>"><a href="#college_post" data-toggle="tab" style="padding-left: 20px;"> <i class="glyphicon glyphicon-send"></i> College Post</a></li><!-- <li class="<?php echo  $TimeLineTab;?>"><a href="#timeline" data-toggle="tab">
                        <i class="glyphicon glyphicon-superscript" ></i> Timeline</a></li>-->
                <li class="<?php echo $activityTab;?>"><a href="#myactivity" data-toggle="tab"><i class="fa  fa-cogs"></i> Activity </a></li>

                <li><a href="#notice" data-toggle="tab"><i class="glyphicon glyphicon-pushpin"></i> Notice </a></li>
                <li><a href="#tranding" data-toggle="tab"><i class="fa fa-users"></i> Trending </a></li>

            </ul>
            <div class="tab-content">
                <div class="<?php echo $homeTab;?> tab-pane" id="activityHome">
                  <?php @include "forum-content-home.php";?>
                </div>

               <!-- <div class="<?php echo $TimeLineTab;?> tab-pane" id="timeline">
                   <?php @include "forum-content-timeline.php";?>
                </div>-->

                <div class="<?php echo $activityTab;?> tab-pane" id="myactivity">
                    <?php @include "forum-content-activity.php";?>
                </div>

                <div class="<?php echo $collegeTab;?> tab-pane" id="college_post">
                    <?php @include "forum-content-offcial-post.php";?>
                </div>

                <div class="tab-pane" id="notice">
                 <?php @include "forum-content-notice.php";?>
                </div>
                <div class="tab-pane" id="tranding">
                    <?php @include "forum-content-tranding.php";?>
                </div>
            </div>
        </div>
    </div>
</div>
</section>