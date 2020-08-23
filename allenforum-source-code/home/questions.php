<?php include "../config/session_header.php"; ?>

<?php
  $pageTitle = "Add Faculty | Allenhouse Group of Colleges";
 // $pageFor = "librarian";
  include('header.php');?>

  <?php  $activeTabDash = "";
         $activeLinkDash = "";
         $activeTabBook = "";
         $activeLinkAddBook = "";
         $activeTabViewDelete = "";
         $activeLinkAddBookViewDelete = "";
         $activeLinkUpdateBookStatus = "";

         $activeTabManageStudents  = "";
         $activeTabManageStudentsAdd = "";
         $activeTabManageStudentsRemove = "";

         $activeTabManageFaculty = "active";
         $activeTabManageFacultyAdd  = "active";
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



      <!--==================Ask question div=========================================================-->
      <section class="content">
          <div class="row">
              <div class="col-md-3">

                  <div class="box box-solid">
                      <div class="box-header with-border">
                          <h3 class="box-title">Lists</h3>

                          <div class="box-tools">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                              </button>
                          </div>
                      </div>
                      <div class="box-body no-padding">
                          <ul class="nav nav-pills nav-stacked">
                              <li><a href="mailbox.html"><i class="fa fa-inbox"></i> Questions Asked
                                      <span class="label label-primary pull-right">12</span></a></li>
                              <li><a href="#"><i class="fa fa-envelope-o"></i> Got Answer</a></li>
                              <li><a href="#"><i class="fa fa-file-text-o"></i> Drafts</a></li>

                          </ul>
                      </div>
                      <!-- /.box-body -->
                  </div>
                  <!-- /. box -->
                  <div class="box box-solid">
                      <div class="box-header with-border">
                          <h3 class="box-title">Category</h3>

                          <div class="box-tools">
                              <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                              </button>
                          </div>
                      </div>
                      <!-- /.box-header -->
                      <div class="box-body no-padding">
                          <ul class="nav nav-pills nav-stacked">
                              <li><a href="#"><i class="fa fa-circle-o text-red"></i> Important</a></li>
                              <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> Others</a></li>
                          </ul>
                      </div>
                      <!-- /.box-body -->
                  </div>
                  <!-- /.box -->
              </div>
              <!-- /.col -->
              <div class="col-md-9">

                  <!-- /. box -->
                      <div class="box">
                          <div class="box-header">
                              <h3 class="box-title">Type Your Question here</h3>

                          </div>
                          <div class="box-body">

                              <div class="row">
                                  <div class="col-sm-4">
                                      <div class="form-group">
                                          <input class="form-control" placeholder="To:">
                                      </div>
                                  </div>
                                  <div class="col-sm-4">
                                      <div class="form-group">
                                          <select name="faculty_select" class="form-control">
                                              <option>--Branch/Department--</option>
                                              <option value="A">Rahul Singh</option>
                                              <option value="A">Hammad Singh</option>

                                              <option value="A">Fateh Sir</option>

                                              <option value="A">Ram ji Sir</option>
                                          </select>
                                      </div>
                                  </div>
                              </div>
                          </div>
                          <!-- /.box-header -->
                          <div class="box-body pad">
                              <form>
                                  <textarea class="form-control"
                                            placeholder="Place some text here"
                                            style="width: 100%; height: 200px; font-size: 14px;
                                            line-height: 18px; border: 1px solid #dddddd; padding: 10px;">
                                  </textarea>
                              </form>
                          </div>
                          <div class="box-footer">
                              <div class="pull-right">
                                  <button type="button" class="btn btn-default"><i class="fa fa-pencil"></i> Draft</button>
                                  <button type="submit" class="btn btn-primary"><i class="fa fa-envelope-o"></i> Send</button>
                              </div>
                              <button type="reset" class="btn btn-default"><i class="fa fa-times"></i> Discard</button>
                          </div>
                          <!-- /.box-footer -->
                      </div>


              </div>
              <!-- /.col -->
          </div>
          <!-- /.row -->
      </section>
      <!-- /.content -->
      <!--==================//Ask question div=========================================================-->





  </div>
  <!-- /.content-wrapper -->

  <?php include('footer.php');?>
 