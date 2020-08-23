<?php include "../config/session_header.php"; ?>
<?php
      $pageTitle = "GATE Dashboard | Allenhouse Group of Colleges";
      include('header.php');?>


  <?php
  $activeTabDash = "active";
  $activeLinkDash = "active";
  include('sidebar.php');?>

  <!-- Content Wrapper. Contains page content (body)-->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
          GATE Prepration
        <small>CHOOSE YOUR STREAM <img src="ownImages/other/time/evening-night.png" width="40" height="30"/> </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="forum-dicussion.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
      <div style="padding-left: 10px;padding-right: 10px;">
          <img src="ownImages/other/line.png"  width="100%" height="1"/>
      </div>
    <!-- Main GATE content  in Gate folder-->
        <?php include('gate/gate.php');?>

   
  </div>
 





  <?php include('footer.php');?>
