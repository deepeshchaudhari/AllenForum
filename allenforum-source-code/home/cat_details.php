<?php include "../config/session_header.php"; ?>
<?php
      $pageTitle = "CAT details | Allenhouse Group of Colleges";
      include('header.php');?>


  <?php
  $activeTabDash = "active";
  $activeLinkDash = "active";
  $type=$_GET['type'];
  $color=$_GET['color'];
  include('sidebar.php');?>

  <!-- Content Wrapper. Contains page content (body)-->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
         CAT QUERIES
         <small><a href="cat_dashboard.php"> <i class="fa  fa-backward"></i> <b>BACK</b> </a>
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
                      switch ($type) {
                       case "1":
                       include('cat/about_cat.php');
                   
                       break;

                       case "2":
                       include('cat/iimlists.php');
                    
                       break;

                       case "3":
                       include('cat/cat_subject.php');
                    
                       break;

                       case "4":
                       include('cat/cat_eligibility.php');
                       break;

                       case "5":
                       include('cat/previous_year_paper_cat.php');
                       
                       break;

                       case "6":
                      include('cat/important_link_cat.php');
                   
                       break;
  
                      default:
                      header("Location:404.php");;
}
              ?>
        

   
  </div>
 





  <?php include('footer.php');?>
