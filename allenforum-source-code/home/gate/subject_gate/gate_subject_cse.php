 <section class="content">
      <!-- COLOR PALETTE -->
   
<?php
   
    switch ($color) {
            case 'red':
          $color="danger";
        break;
            case 'aqua':
          $color="danger";
        break;
            case 'green':
          $color="success";
        break;
            case 'yellow':
          $color="warning";
        break;
            case 'orange':
          $color="Active";
        break;

      
      default:
         $color="white";
        break;
    }
?>

 <div class="row">
   <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
      

              <h3 class="box-title">GATE exam is divided in three part:-</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-book"></i> GENERAL APTITUDE</h4>
                General Aptitude: 15 marks<br><b>
                (It will contain total 10 questions of maximum 15 marks (5 questions of 1 mark and 5 questions of 2 marks).</b>
              </div>
              <div class="alert alert-warning alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-book"></i> TECHNICAL QUESTIONS</h4>
                Technical Section:70 marks<br><b>
                (There will be a negative marking of 1/3 marks for the questions carrying 1 mark. Likewise, for questions carrying 2 marks, 2/3 marks will be deducted. No negative marking for Numerical Answer Type questions).</b>
              </div>
              <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-book"></i>ENGINEERING MATHEMATICS</h4>
                Engineering Mathematics:15 marks<br><b>(same as above)
              </div>
           
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-md-12">
          <!-- Custom Tabs -->
           <div class="col-md-12">
          <div class="box box-default">
            <div class="box-header with-border">
              <i class="fa fa-book"></i>

              <h3 class="box-title"><?php echo"$branch"; ?> Subject & Syllabus </h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">


  <?php $i=1;
    while ( $i<13) {?>
      <center>
       <div class="box-body">
              <ul class="products-list product-list-in-box">
                
                <a href="https://www.iitm.ac.in/" style="color: #000;" target="_blank"> 
                <li class="item">
                  <div class="product-img">
                   <img src="dist/img/book.png" alt="Product Image">
                  </div>
                  <div class="product-info">
                   <b>SUBJECT <?php echo"$i";?> </b>
                  <span class="product-description">
                  <b>( 2-10 marks )</b> 
                  <!-- <i class="fa fa-external-link fa-2x" aria-hidden="true"></i> -->
                  </span>
                  </div>
                </li>
                </a><br>
              </ul>
            </div>

</center>
 <?php $i++;  }
   ?>
          



            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
     
      
        <!-- /.col -->
</div>
</div>
</section>