<?php
$common = new CommonFunctions();
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
$totalLikesCount = $like->total_likes;

?>

<br/>

1. How many my asked question liked(SUM) : <?php echo $totalLikesCount;?> <br/>
2. How many Contribution post I have done : <?php echo $contribution_postCount;?><br/>
3. How many people followed me : <?php echo $followerCount;?><br/>
4. Total rates on my all given answers : <?php echo $total_rate;?> <br/>
5. Trending formula:  <br/>
total coins = 10*followers + 1* clap + 1* rating +5* Contribution post<br/>
= <?php
 $coins = 0;
$coins =  10* $followerCount+1*$totalLikesCount+1*$total_rate+5*$contribution_postCount;
echo $coins;
?>



<!--
<div class="row">
    <div class="col-sm-12">
        <div class="box-header with-border">
            <h3 class="box-title">Tranding Allenits</h3>
        </div>
        <div class="box-body no-padding">
            <ul class="users-list clearfix">
                <li>
                    <img src="dist/img/user1-128x128.jpg" alt="User Image">
                    <a class="users-list-name" href="#">Alexander Pierce</a>
                    <span class="users-list-date">Today</span>
                </li>
                <li>
                    <img src="dist/img/user8-128x128.jpg" alt="User Image">
                    <a class="users-list-name" href="#">Norman</a>
                    <span class="users-list-date">Yesterday</span>
                </li>
                <li>
                    <img src="dist/img/user7-128x128.jpg" alt="User Image">
                    <a class="users-list-name" href="#">Jane</a>
                    <span class="users-list-date">12 Jan</span>
                </li>
                <li>
                    <img src="dist/img/user6-128x128.jpg" alt="User Image">
                    <a class="users-list-name" href="#">John</a>
                    <span class="users-list-date">12 Jan</span>
                </li>
                <li>
                    <img src="dist/img/user2-160x160.jpg" alt="User Image">
                    <a class="users-list-name" href="#">Alexander</a>
                    <span class="users-list-date">13 Jan</span>
                </li>
                <li>
                    <img src="dist/img/user5-128x128.jpg" alt="User Image">
                    <a class="users-list-name" href="#">Sarah</a>
                    <span class="users-list-date">14 Jan</span>
                </li>
                <li>
                    <img src="dist/img/user4-128x128.jpg" alt="User Image">
                    <a class="users-list-name" href="#">Nora</a>
                    <span class="users-list-date">15 Jan</span>
                </li>
                <li>
                    <img src="dist/img/user3-128x128.jpg" alt="User Image">
                    <a class="users-list-name" href="#">Nadia</a>
                    <span class="users-list-date">15 Jan</span>
                </li>
            </ul>
        </div>
    </div>
</div>-->

<table class="table" >
    <tr>
        <th>Sr.</th>
        <th>Name</th>
        <th>User Id</th>
        <th>Likes</th>
        <th>Contribution</th>
        <th>Followers</th>
        <th>Rates</th>
        <th>Coins</th>
    </tr>
    <?php
    /*
     * Calculate the same data of all students
     */
    $count = $common->getAllStudentCount($connection);

    $sr =1; $trending = 0;
    while ($student = $count->fetch_object() ){
        $studentId = $student->user_id;

        $totalLikess = $common->getTotalLikeOnQuesByAllUserId($connection,$studentId);
        $like = $totalLikess->fetch_object();
        $totalLikesCount = $like->total_likes;

        $contribution_post = $common->getAllContributionPostByUsersId($connection,$studentId);
        if ($contribution_post){
            $contribution_postCount = $contribution_post->num_rows;
        }

        $follower = $common->getAllFollowerByUsersId($connection,$studentId);
        if ($follower){
            $followerCount = $follower->num_rows;
        }

        $rates = $common->getTotalRatesOfAnwersByAllUsersId($connection,$studentId);
        $row = $rates->fetch_object();
        $total_rate = $row->total_rate;

       $totalCoins =  10* $followerCount+1*$totalLikesCount+1*$total_rate+5*$contribution_postCount;
       if($trending == 0) {
           $saveTrending = $common->saveTrendingData($connection, $studentId, $totalLikesCount, $contribution_postCount, $followerCount, $total_rate, $totalCoins);
       }
        ?>
        <tr>
            <td><?php echo $sr;?></td>
            <td><?php echo $student->name;?></td>
            <td><?php echo $student->user_id;?></td>
            <td><?php echo (($totalLikesCount)=='' ? '0' : $totalLikesCount);?></td>
            <td><?php echo $contribution_postCount;?></td>
            <td><?php echo $followerCount;?></td>
            <td><?php echo $total_rate;?></td>
            <td><?php echo (($student->user_id)==$_SESSION['userId']? $totalCoins.'(Your Rating)' :$totalCoins);?></td>


        </tr>


   <?php $sr++;  }
    $trending = $trending+1;


    ?>
</table>
