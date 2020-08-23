<?php include "../config/session_header.php"; ?>

<?php
  $pageTitle = "View Faculties | Allenhouse Group of Colleges";
 // $pageFor = "librarian";
  include('header.php');?>

  <?php  $activeTabDash = "";
         $activeLinkDash = "";

         include('sidebar.php');?>

  <!-- Content Wrapper. Contains page content (body)-->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->

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


      <!-- Main content -->
      <section class="content">
          <!--=====================display and remove students with ===========================-->
          <div class="row">
              <div class="col-md-12">
                  <div class="box box-success">
                      <div class="box-header with-border">
                          <h3 class="box-title"><a href="add-faculties.php?action=add_faculty"><i class="fa  fa-arrow-left"> Add Faculty</i></a></h3>
                      </div>
                      <form method="post" runat="server"  onsubmit="ShowLoading()">
                      <div style="padding: 10px;">
                          <button type="submit"  name="deleteFacultyBtn" class="btn btn-danger" formaction="scripts/admin/delete-faculty-script.php">
                              <i class="fa fa-close"></i> Delete Faculties</button>
                      </div>
                      <div class="row">
                          <div class="col-md-12">
                              <div class="box-body table-responsive no-padding">
                                  <table id="example2" class="table small table-bordered table-hover">
                                      <thead style="background-color:teal;color: white">
                                      <?php $facultyQuery = mysql_query("select * from forum_users where role = 'faculty' ")
                                      or die("students not found".mysql_error());?>
                                      <tr>
                                          <th>Sr.No</th>
                                          <th>Roll No.</th>
                                          <th>Profile</th>
                                          <th>Name</th>
                                          <th>Email</th>
                                          <th>Select</th>
                                      </tr>
                                      </thead>
                                      <tbody>
                                          <?php $sr = 1; $i = 0;
                                          while($faculty = mysql_fetch_array($facultyQuery)):?>
                                          <tr>
                                             <td><?php echo $sr;?></td>
                                             <td><?php echo $faculty['user_id'];?></td>
                                             <td><img src="<?php echo $faculty['profile_pic'];?>" class="img-circle" width="50" height="50"/></td>
                                             <td><?php echo $faculty['name'];?></td>
                                             <td><?php echo $faculty['user_email'];?></td>
                                              <td>
                                                  <input type="checkbox" name="facultyDeleteCheckBox[]"
                                                         value="<?php echo $faculty['id'];?>" />
                                              </td> <!--form submit button is given above  due to design-->
                                          </tr>
                                          <?php $sr++; $i++;endwhile;?>

                                      </tbody>
                                  </table>
                              </div>
                          </div>
                      </div>
                      </form>
                  </div>
              </div>
          </div>
          <!--=====================================//=======================================-->
      </section>

  </div>
  <!-- /.content-wrapper -->
  <?php include('footer.php');?>
 