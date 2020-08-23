<?php include "../config/session_header.php"; ?>
<?php
      $pageTitle = "Welcome in Dashboard | Allenhouse Group of Colleges";
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
         <?php echo strtoupper("$branch");?> GATE
         DASHBOARD <small><a href="gate_branch.php"> <i class="fa  fa-backward"></i> <b>BACK</b> </a>
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
           <?php
                      switch ($branch) {
                       case "cse":
                       include('gate/gate_option.php');
                   
                       break;

                       case "me":
                       include('gate/gate_option.php');
                    
                       break;

                       case "ce":
                       include('gate/gate_option.php');
                       
                       break;

                       case "ece":
                       include('gate/gate_option.php');
                   
                       break;

                       case "ee":
                       include('gate/gate_option.php');
                    
                       break;
    
                      default:
                      header("Location:404.php");;
}
              ?>
        

   
  </div>
 





  <?php include('footer.php');?>
