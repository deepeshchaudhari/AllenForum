<?php include "../config/session_header.php"; ?>

<?php
  $pageTitle = "Update Books Status || Library || Allenhouse Group of Colleges";
  include('header.php');?>

  <?php  $activeTabDash = "";
         $activeLinkDash = "";
         $activeTabBook = "active";
         $activeLinkAddBook = "";
  $activeTabViewDelete = "";
  $activeLinkAddBookViewDelete = "";
  $activeLinkUpdateBookStatus = "active";

  $activeTabManageFaculty = "";
  $activeTabManageFacultyAdd  = "";
  $activeTabManageFacultyRemove = "";
  include('sidebar.php');?>

  <!-- Content Wrapper. Contains page content (body)-->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
  <?php include "codePlugins/book-count-code.php";?>

      <script type="text/javascript">
          function ShowLoading(e) {
              var div = document.createElement('div');
              var img = document.createElement('img');
              img.src = 'ownImages/library/loading1.gif';
              div.innerHTML = "Processing...<br />";
              div.style.cssText = 'position: fixed; top: 15%; left: 40%; z-index: 5000; width: 422px; text-align: center; ';
              div.appendChild(img);
              document.body.appendChild(div);
              return true;
              // These 2 lines cancel form submission, so only use if needed.
              //window.event.cancelBubble = true;
              //e.stopPropagation();
          }
      </script>


      <!--=================================add book section============================-->
      <!-- Main content -->
      <section class="content">
          <div class="row">
              <div class="col-md-12">
                  <div class="box box-success">
                      <div class="box-header with-border">
                          <h3 class="box-title"><a href="update-book-status.php"><i class="fa  fa-arrow-left">  Back</i></a></h3>
                      </div>
                      <div class="box-body">
                          <form action="scripts/library/update-book-status-script.php" method="post" runat="server"  onsubmit="ShowLoading()">
                          <div class="row">
                              <div class="col-sm-3">
                                <label>Book ID : </label>
                                  <?php echo $_SESSION['book_id'];?>
                                  <input type="hidden" name="book_id" value="<?php echo $_SESSION['book_id'];?>">
                              </div>
                              <div class="col-sm-3">
                                 <label>Book Title : </label>
                                  <?php echo $_SESSION['book_title'];?>
                              </div>
                              <div class="col-sm-3">
                                 <label>Book Author: </label>
                                  <?php echo $_SESSION['author'];?>
                              </div>
                              <div class="col-sm-3">
                                 <label>Department :</label>
                                 <?php echo $_SESSION['department'];?>
                              </div>
                          </div> <br/>
                              <div class="row">
                                 <div class="col-md-3">
                                      <label>Book Year :</label>
                                      <?php echo $_SESSION['bookYear'];?>
                                  </div>
                                  <div class="col-md-3">
                                      <label>Book Quanity: </label>
                                      <input type="number" name="updatedQty" class = "form-control"
                                       value="<?php echo $_SESSION['book_qty'];?>">
                                  </div>


                              </div>
                          <div class="row">
                              <div class="col-md-2"><br/>
                                 <button type="submit"  name="updateBookStatusBtn" class="btn btn-primary" formaction="scripts/library/update-book-status-script.php"><i class="fa fa-check-circle"></i> Update</button>
                              </div>
                          </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>

         <!-- <div class="row">
              <div class="col-md-12">
                  <div class="box box-success">
                      <div class="box-header with-border">
                          <h3 class="box-title"><a href="dashboard.php"><i class="fa  fa-arrow-left"> Add Book With Sheet</i></a></h3>
                      </div>
                      <div class="box-body">
                          <form action="" method="post" enctype="multipart/form-data" runat="server"  onsubmit="ShowLoading()">
                              <div class="row">
                                  <div class="col-md-3">
                                      <input type="file" name = "bookSheet" class="form-control"/>
                                  </div>
                                  <div class="col-md-3">
                                      <button type="submit" name="addBookWithCSVBtn" class="btn btn-success" formaction="scripts/library/add-book-script.php"><i class="fa fa-check-circle"></i> Upload Sheet</button>
                                  </div>
                              </div>
                          </form>
                      </div>
                  </div>
              </div>
          </div>-->

     </section>
      <!--=====================================//=======================================-->

  </div>
  <!-- /.content-wrapper -->
  <?php include('footer.php');?>
 