<?php include "../config/session_header.php"; ?>
<?php
      $pageTitle = "Welcome in Dashboard | Allenhouse Group of Colleges";
      include('header.php');?>


  <?php
  $activeTabDash = "active";
  $activeLinkDash = "active";
  $branch="CAT";
  $color="blue";
  include('sidebar.php');?>

  <!-- Content Wrapper. Contains page content (body)-->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         <?php echo strtoupper("$branch");?> (Common Admission Test)
         DASHBOARD <small><a href=forum-dicussion.php?home=active&page=home%20page"> <i class="fa  fa-backward"></i> <b>BACK</b> </a>
        </small>
       </h1>
       <ol class="breadcrumb">
        <li><a href="forum-discussion.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
      </section>
      <div style="padding-left: 10px;padding-right: 10px;">
          <img src="ownImages/other/line.png"  width="100%" height="1"/>
      </div> <!-- Main GATE content  in Gate folder-->
           

    <!-- Main content -->
        <section class="content">

      <div class="row">
       <!--........................................1 is use for about gate page................-->
      <a href="cat_details.php?type=1&color=<?php echo $color ;?>" style="color: #000;"> 

       <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-<?php echo "$color" ?>"><i class="ion-information-circled"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><b>ABOUT  <?php echo "$branch"; ?></b></span>
              <span class="info-box-text">(Information)</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div></a>
        <!-- /.col -->
         <!--........................................2 is use for PSU................-->
         <a href="cat_details.php?type=2&color=<?php echo $color ;?>" style="color: #000;">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-<?php echo "$color" ?>"><i class="fa fa-bank"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><b> IIM's</b></span>
              <span class="info-box-text">(Through CAT)</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      </a>
        <!-- /.col -->
         <!--.......................................3 is use for GAte subject................-->
         <a href="cat_details.php?type=3&color=<?php echo $color ;?>" style="color: #000;">
        <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-<?php echo "$color" ?>"><i class="ion-ios-book"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><b><?php echo "$branch"; ?> SUBJECT</b></span>
              <span class="info-box-text">(Weightage)</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      </a>
        <!-- /.col -->
         <!--....................................4 is use for Gate syllabus................-->
      <!--   <a href="cat_details.php?type=4&color=<?php echo $color ;?>" style="color: #000;">-->
      <!--  <div class="col-md-3 col-sm-6 col-xs-12">-->
      <!--    <div class="info-box">-->
      <!--      <span class="info-box-icon bg-<?php echo "$color" ?>"><i class="fa fa-book"></i></span>-->

      <!--      <div class="info-box-content">-->
      <!--        <span class="info-box-text"><b> Eligibility & Fee</b></span>-->
      <!--        <span class="info-box-text">(Table-wise)</span>-->
      <!--      </div>-->
            <!-- /.info-box-content -->
      <!--    </div>-->
          <!-- /.info-box -->
      <!--  </div>-->
      <!--</a>-->
        <!-- /.col -->
         <!--........................................6 is use for gate paper................-->
   <a href="cat_details.php?type=5&color=<?php echo $color ;?>" style="color: #000;">
         <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-<?php echo "$color" ?>"><i class="ion-ios-paper"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><b>CAT PREVIOUS YEAR PAPER</b></span>
              <span class="info-box-text">(2004-2015)</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      </a>
       <!--.....................................6 is use for important link................-->
 <a href="cat_details.php?type=2&color=<?php echo $color ;?>" style="color: #000;">
         <div class="col-md-3 col-sm-6 col-xs-12">
          <div class="info-box">
            <span class="info-box-icon bg-<?php echo "$color" ?>"><i class="ion ion-link"></i></span>

            <div class="info-box-content">
              <span class="info-box-text"><b>IMPORTANT LINKS</b></span>
              <span class="info-box-text">(official website,etc.)</span>
            </div>
            <!-- /.info-box-content -->
          </div>
          <!-- /.info-box -->
        </div>
      </a>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- =========================================================== -->

</section>
   
 
        

   
  </div>
 





  <?php include('footer.php');?>
