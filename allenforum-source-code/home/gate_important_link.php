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
          GATE IMPORTANT LINK's
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



       <section class="content">
      <!-- COLOR PALETTE -->
   
<?php
   
    switch ($color) {
            case 'red':
          $color="danger";
        break;
            case 'aqua':
          $color="info";
        break;
            case 'green':
          $color="success";
        break;
            case 'yellow':
          $color="warning";
        break;
            case 'orange':
          $color="warning";
        break;

      
      default:
         $color="white";
        break;
    }
?>
<div class="row">
        <div class="col-md-12">
          <!-- Custom Tabs -->
            <!-- PRODUCT LIST -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Yearwise GATE paper</h3>

            
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <ul class="products-list product-list-in-box">
                
                <a href="https://www.iitm.ac.in/" style="color: #000;" target="_blank"> 
                <li class="item">
                  <div class="product-img">
                   <img src="dist/img/external.png" alt="Product Image">
                  </div>
                  <div class="product-info">
                   GATE 2019 Held BY IITM
                  <span class="product-description">
                  IITM(INdian Institue OF Technology MADRAS), Institute Offcial website <b>( TAP ME )</b> 
                  <i class="fa fa-external-link fa-2x" aria-hidden="true"></i>
                  </span>
                  </div>
                </li>
                </a><br>
                <!-- /.item -->

                <a href="https://www.gate.iitm.ac.in/" style="color: #000;" target="_blank"> 
                <li class="item">
                  <div class="product-img">
                   <img src="dist/img/external.png" alt="Product Image">
                  </div>
                  <div class="product-info">
                   GATE 2019 Official Website
                  <span class="product-description">
                  IITM(INdian Institue OF Technology MADRAS), Institute Offcial website <b>( TAP ME )</b> 
                  <i class="fa fa-external-link fa-2x" aria-hidden="true"></i>
                  </span>
                  </div>
                </li>
                </a><br>
                <!-- item -->
                <a href="" style="color: #000;" target="_blank"> 
                <li class="item">
                  <div class="product-img">
                   <img src="dist/img/external.png" alt="Product Image">
                  </div>
                  <div class="product-info">
                  Commencement of Online Application Form
                  <span class="product-description">
                  1st week of September 2018<b>( TAP ME )</b> 
                  <i class="fa fa-external-link fa-2x" aria-hidden="true"></i>
                  
                  </span>
                  </div>
                </li>
                </a><br>
                <!-- /.item -->
                 <a href="https://drive.google.com/file/d/0B2kqrqyN1YIJTlF5Y09NaS1yUms/view" style="color: #000;" target="_blank"> 
                <li class="item">
                  <div class="product-img">
                   <img src="dist/img/external.png" alt="Product Image">
                  </div>
                  <div class="product-info">
                  GATE 2018 Information Brouchure
                  <span class="product-description">
                 You can check Information Brouchure here<b>( TAP ME )</b> 
                  <i class="fa fa-external-link fa-2x" aria-hidden="true"></i>
                  
                  </span>
                  </div>
                </li>
                </a><br>
                 <!-- /.item -->
                  <a href="" style="color: #000;" target="_blank"> 
                <li class="item">
                  <div class="product-img">
                   <img src="dist/img/external.png" alt="Product Image">
                  </div>
                  <div class="product-info">
                  GATE 2019 Exam Pattern
                  <span class="product-description">
                 You can check exam patterm here<b>( TAP ME )</b> 
                  <i class="fa fa-external-link fa-2x" aria-hidden="true"></i>
                  
                  </span>
                  </div>
                </li>
                </a><br>
            </ul>
          </div>
        </div>
      </div>
    </div>


</section>


   
  </div>
 





  <?php include('footer.php');?>
