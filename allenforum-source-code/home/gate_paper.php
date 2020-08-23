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
          GATE Previous Year Papers
        <?php echo strtoupper("$branch")?>  
        <small>
          <a href="gate_dashboard.php?branch=<?php echo"$branch"?>&color=<?php echo"$color"?>"><i class="fa  fa-backward"></i> <b>BACK</b>
          </a>
        </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="forum-discussion.php"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
      <div style="padding-left: 10px;padding-right: 10px;">
          <img src="ownImages/other/line.png"  width="100%" height="1"/>
      </div>
     <?php
                      switch ($branch) {
                       case "cse":
                       include('gate/previous_year_paper_gate/previous_year_paper_cse.php');
                      
                       break;

                       case "me":
                      include('gate/previous_year_paper_gate/previous_year_paper_me.php');
                      
                       break;

                       case "ce":
                       include('gate/previous_year_paper_gate/previous_year_paper_ce.php');
                      
                       break;

                       case "ece":
                       include('gate/previous_year_paper_gate/previous_year_paper_ece.php');
                      
                       break;

                       case "ee":
                       include('gate/previous_year_paper_gate/previous_year_paper_ee.php');
                      
                       break;
    
                      default:
                      header("Location:404.php");;
}
              ?>
        

   
  </div>
 





  <?php include('footer.php');?>
