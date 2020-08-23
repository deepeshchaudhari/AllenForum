<?php include "../config/session_header.php"; ?>
<?php
      $pageTitle = "About Gate | Allenhouse Group of Colleges";
      include('header.php');?>


  <?php
  $activeTabDash = "active";
  $activeLinkDash = "active";
  $branch=$_GET['branch'];
  $color=$_GET['color'];
  include('sidebar.php');?>

  <!-- Content Wrapper. Contains page content (body)-->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          GATE Eligibility
        <?php echo strtoupper("$branch");?>
        <a href="gate_dashboard.php?branch=<?php echo"$branch"?>&color=<?php echo"$color"?>"><i class="fa  fa-backward"></i>
         <small><b>BACK</b></a> </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
      <div style="padding-left: 10px;padding-right: 10px;">
          <img src="ownImages/other/line.png"  width="100%" height="1"/>
      </div>
            <?php include('gate/eligibility_gate/eligibility_criteria.php');?>
   
  </div>
 





  <?php include('footer.php');?>
