<?php //include "../config/config.php";?>
<?php
 $addBookActive = "active";
?>
<!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
          <img src="ownImages/other/allenhouse-logo.png" width="150"  alt="User Image">
      </div>

      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
          <li class="<?php echo $activeTabDash;?> treeview">
              <a href="<?php if ($_SESSION['userrole'] == 'admin' || $_SESSION['userrole'] == 'librarian' || $_SESSION['userrole'] == 'receptionist') echo 'dashboard.php?action=home'; else echo 'forum-dicussion.php?home=active&page=home page'?>">
                  <i class="fa fa-home"></i> <span>Dashboard</span>
                  <span class="pull-right-container"></span>
              </a>
          </li>
          <?php
		 /*
		  * This is the case for Librarian Login
		  */
          if ( $_SESSION['userrole'] == "librarian"){?>
        <li class="<?php ;?> treeview">
          <a href="#">
            <i class="fa fa-book"></i> <span>Manage Books</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li class="<?php ;?>"><a href="add-books.php?action=add"><i class="fa fa-angle-double-right"></i>Add New Book</a></li>
            <li class="<?php ;?>"><a href="view-library-books.php"><i class="fa fa-angle-double-right"></i>View Library</a></li>
           <li class="<?php ;?>"><a href="forum-upload-book.php?action=upload&filetype=CSV"><i class="fa fa-angle-double-right"></i>Upload Books</a></li>

          </ul>
        </li>
        <li class="<?php /*;*/?> treeview">
          <a href="#">
              <i class="glyphicon glyphicon-list-alt"></i> <span>Book Entry</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
              <li class="<?php /*;*/?>"><a href="search-book-to-entry.php"><i class="fa fa-angle-double-right"></i>Book Entry</a></li>
          </ul>
          </li>
      <?php
              /*
               * ** Librarian section ends here
               */
          }
          else
              /*
               * Student Sidebar section starts here
               */
              if ( $_SESSION['userrole'] == "student"){ ?>
                  <li class="<?php ;?> treeview">
                      <a href="view-library-books.php?action=view_books">
                          <i class="fa fa-book"></i> <span>Library</span>
                      </a>
                  </li>
                  <li class="<?php ;?> treeview">
                      <a href="#">
                          <i class="fa  fa-stack-overflow"></i> <span>Discussion</span>
                          <span class="pull-right-container">
                               <i class="fa fa-angle-left pull-right"></i>
                          </span>
                      </a>
                      <ul class="treeview-menu">
                          <li class="<?php ;?>">
                              <a href="ask-questions.php?action=askQuestions">
                                  <i class="fa fa-angle-double-right"> </i>
                                 Discuss
                              </a>
                          </li>
                          <li class="<?php ;?>">
                              <a href="my-saved-answers.php">
                                  <i class="fa fa-angle-double-right"> </i>
                                  Saved Answers
                              </a>
                          </li>
                          <li class="<?php ;?>">
                              <a href="forum-shared.php?type=shared questions&page=discussion">
                                  <i class="fa fa-angle-double-right"> </i>
                                  Shared
                              </a>
                          </li>
                          <li class="<?php ;?>">
                              <a href="forum-trending.php?page=trending-of-the-week">
                                  <i class="fa fa-angle-double-right"> </i>
                                  Trending
                              </a>
                          </li>
                          <li class="<?php ;?>">
                              <a href="forum-discussion-personal.php?action=discuss&type=single">
                                  <i class="fa fa-angle-double-right"> </i>
                                  Personal Chat
                              </a>
                          </li>
                        <!--  <li class="<?php /*;*/?>">
                              <a href="personal-discussion-box.php?tab=inbox">
                                  <i class="fa fa-angle-double-right"> </i>
                                  Personal Box
                              </a>
                          </li>-->
                           <li class="<?php ;?>">
                              <a href="search-library-books.php?view=book&type=search">
                                  <i class="fa fa-angle-double-right"> </i>
                                  Search Book
                              </a>
                          </li>
                      </ul>
                  </li>
             <?php
                  /*
                   * ** Student sidebar section ends here...
                   */
              }
              else
                  /*
                   * The admin Work Section starts here
                   */
                  if ($_SESSION['userrole'] == "admin") {
                  // means for admin ?>
                  <li class="<?php ;?> treeview">
                      <a href="#">
                          <i class="fa fa-graduation-cap"></i> <span>Manage Student</span>
                          <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                      </a>
                      <ul class="treeview-menu">
                          <li class="<?php ;?>"><a href="add-students.php?action=add_students"><i class="fa fa-angle-double-right"></i>Add</a></li>
                          <li class="<?php ;?>"><a href="students-details.php?action=view"><i class="fa fa-angle-double-right"></i>View</a></li>
                      </ul>
                  </li>
                  <li class="<?php ;?> treeview">
                      <a href="#">
                          <i class="fa  fa-users"></i> <span>Manage Faculty</span>
                          <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                      </a>
                      <ul class="treeview-menu">
                          <li class="<?php ;?>"><a href="add-faculties.php?action=add_faculty"><i class="fa fa-angle-double-right"></i>Add</a></li>
                          <li class="<?php ;?>"><a href="faculties-details.php?action=view"><i class="fa fa-angle-double-right"></i>View</a></li>
                      </ul>
                  </li>
                    <!--  <li class="<?php /*;*/?> treeview">
                          <a href="#">
                              <i class="fa  fa-user-secret"></i> <span>Admins</span>
                              <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                          </a>
                          <ul class="treeview-menu">
                              <li class="<?php /**/?>">
                                  <a href="manage-admins.php">
                                      <i class="fa fa-angle-double-right"></i>
                                      Manage</a>
                              </li>
                          </ul>
                      </li>-->
                      <li class="<?php ;?> treeview">
                          <a href="#">
                              <i class="fa fa-circle-o-notch"></i><span> Users Setting</span>
                              <span class="pull-right-container">
                               <i class="fa fa-angle-left pull-right"></i>
                          </span>
                          </a>
                          <ul class="treeview-menu">
                              <li class="<?php ?>">
                                  <a href="block-users.php?action=block users">
                                      <i class="fa fa-angle-double-right"> </i>
                                      Block User
                                  </a>
                              </li>
                          </ul>
                      </li>
                        <li class="<?php ;?> treeview">
                          <a href="admin-feedbacks.php?action=view">
                              <i class="fa fa-hand-paper-o"></i> <span>Feedback-s</span>
                              <span class="pull-right-container"></span>
                          </a>
                         </li>
                      <li class="<?php ;?> treeview">
                          <a href="forum-reports.php?action=view report&title=allenforum report">
                              <i class="fa  fa-line-chart"></i> <span>Reports</span>
                              <span class="pull-right-container"></span>
                          </a>
                      </li>
                      <li class="<?php ;?> treeview">
                          <a href="manage-forum-data.php?action=manage&with=sheet&type=CSV">
                              <i class="fa fa-upload"></i> <span>Upload Sheets</span>
                              <span class="pull-right-container"></span>
                          </a>
                      </li>


                      <li class="<?php ;?> treeview">
                          <a href="#">
                              <i class="glyphicon glyphicon-phone-alt"></i> <span>Companies</span>
                              <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                          </a>
                          <ul class="treeview-menu">
                              <li class="<?php ;?> treeview">
                                  <a href="forum-career-information.php">
                                      <i class="fa fa-angle-double-right"></i><span>Add Information</span>
                                      <span class="pull-right-container"></span>
                                  </a>
                              </li>
                          </ul>
                      </li>


                      <li class="<?php ;?> treeview">
                          <a href="#">
                              <i class="fa  fa-hand-o-right"></i> <span>Receptionist</span>
                              <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                          </a>
                          <ul class="treeview-menu">
                              <li class="<?php ?>"><a href="add-receptionist.php?action=add receptionist"><i class="fa fa-angle-double-right"></i>Add Receptionist</a></li>
                          </ul>
                      </li>
                      <li class="<?php ;?> treeview">
                          <a href="#">
                              <i class="fa  fa-hand-o-right"></i> <span>Librarian</span>
                              <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                          </a>
                          <ul class="treeview-menu">
                              <li class="<?php ?>"><a href="manage-librarian.php?action=add librarian"><i class="fa fa-angle-double-right"></i>Add Librarian</a></li>
                          </ul>
                      </li>
             <?php }
             /*
              * ** The admin section ends here..
              */
             else if ($_SESSION['userrole'] == "receptionist"){
                      /*
                       * Now  the Recepetionist Section starts here..
                       */ ?>
                 <li class="<?php ;?> treeview">
                     <a href="#">
                         <i class="glyphicon glyphicon-pushpin"></i><span>Notices</span>
                         <span class="pull-right-container">
                               <i class="fa fa-angle-left pull-right"></i>
                          </span>
                     </a>
                     <ul class="treeview-menu">
                         <li class="<?php ;?>">
                             <a href="add-notice.php?action=add notice">
                                 <i class="fa fa-angle-double-right"> </i>
                                 Add Notice </a>
                         </li>
                         <li class="<?php ;?>">
                             <a href="view-notice.php">
                                 <i class="fa fa-angle-double-right"> </i>
                                 View Notice </a>
                         </li>
                     </ul>
                 </li>

          <?php } else{
                 /*
                  * this is faculty
                  */
                 ?>
                 <li class="<?php ;?> treeview">
                     <a href="#">
                         <i class="fa  fa-graduation-cap"></i><span> Student Forum</span>
                         <span class="pull-right-container">
                               <i class="fa fa-angle-left pull-right"></i>
                          </span>
                     </a>
                     <ul class="treeview-menu">
                         <li class="<?php ?>">
                             <a href="forum-dicussion.php?home=active">
                                 <i class="fa fa-angle-double-right"> </i>
                                 Let's Answer </a>
                         </li>
                         <li class="<?php ;?>">
                             <a href="my-saved-answers.php">
                                 <i class="fa fa-angle-double-right"> </i>
                                 Saved Answers  </a>
                         </li>
                         <li class="<?php ;?>">
                             <a href="forum-discussion-personal.php?action=discuss&type=single">
                                 <i class="fa fa-angle-double-right"> </i>
                                 Personal Chat
                             </a>
                         </li>
                         <!--<li class="<?php /*;*/?>">
                             <a href="personal-discussion-box.php?tab=inbox">
                                 <i class="fa fa-angle-double-right"> </i>
                                 Personal Box
                             </a>
                         </li>-->
                     </ul>
                 </li>
                 <li class="<?php ;?> treeview">
                     <a href="#">
                         <i class="glyphicon glyphicon-certificate"></i><span> Officials</span>
                         <span class="pull-right-container">
                               <i class="fa fa-angle-left pull-right"></i>
                          </span>
                     </a>
                     <ul class="treeview-menu">
                         <li class="<?php ?>">
                             <a href="official-post.php">
                                 <i class="fa fa-angle-double-right"> </i>
                                 Post Something
                             </a>
                         </li>
                         <li>
                             <a href="forum-dicussion.php?college_post=active">
                                 <i class="fa fa-angle-double-right"> </i>
                                 See My Official
                             </a>
                         </li>
                     </ul>
                 </li>
                 <li class="<?php ;?> treeview">
                     <a href="#">
                         <i class="fa fa-circle-o-notch"></i><span> Users Setting</span>
                         <span class="pull-right-container">
                               <i class="fa fa-angle-left pull-right"></i>
                          </span>
                     </a>
                     <ul class="treeview-menu">
                         <li class="<?php ?>">
                             <a href="block-users.php?action=block users">
                                 <i class="fa fa-angle-double-right"> </i>
                                 Block User
                             </a>
                         </li>
                     </ul>
                 </li>


                 <li class="<?php ;?> treeview">
                     <a href="#">
                         <i class="glyphicon glyphicon-share"></i><span> Share</span>
                         <span class="pull-right-container">
                               <i class="fa fa-angle-left pull-right"></i>
                          </span>
                     </a>
                     <ul class="treeview-menu">
                         <li class="<?php ?>">
                             <a href="forum-shared.php?type=shared%20questions&page=discussion">
                                 <i class="fa fa-angle-double-right"> </i>
                                 Shared Questions
                             </a>
                         </li>
                     </ul>
                 </li>
          <?php  }
          ?>
          <li class="<?php  ;?> treeview">
              <a href="#">
                  <i class="fa  fa-wrench"></i><span> Setting</span>
                  <span class="pull-right-container">
                       <i class="fa fa-angle-left pull-right"></i>
                  </span>
              </a>
              <ul class="treeview-menu">
                  <li class="<?php  ?>">
                      <a href="<?php if ($_SESSION['userrole'] == 'student'){echo 'user-profile.php?setting=profile setting';} elseif ($_SESSION['userrole'] == 'faculty'){echo '#';}?>">
                          <i class="fa fa-angle-double-right"> </i>
                          Profile Setting</a>
                  </li>
                  <li class="<?php  ?>">
                      <a href="password-reset.php?action=password Reset">
                          <i class="fa fa-angle-double-right"> </i>
                          Reset Password </a>
                  </li>
              </ul>
          </li>

          <?php if ($_SESSION['userrole'] == 'student' || $_SESSION['userrole'] == 'faculty') { ?>
              <li class="<?php  ;?> treeview">
                  <a href="#">
                      <i class="glyphicon glyphicon-star"></i><span> Contribute</span>
                      <span class="pull-right-container">
                               <i class="fa fa-angle-left pull-right"></i>
                          </span>
                  </a>
                  <ul class="treeview-menu">
                      <li class="<?php  ?>">
                          <a href="upload-notes.php?action=upload">
                              <i class="fa fa-angle-double-right"> </i>
                              Upload Notes </a>
                      </li>

                      <li class="<?php  ?>">
                          <a href="write-posts.php">
                              <i class="fa fa-angle-double-right"> </i>
                              Write Post </a>
                      </li>
                  </ul>
              </li>
              <li class="<?php  ;?> treeview">
                  <a href="all-notes-uploaded.php?category=all&type=contribution">
                      <i class="glyphicon glyphicon-folder-open"></i><span> Academic Notes</span>
                  </a>
              </li>
              <li class="<?php  ;?> treeview">
                  <a href="my-posts.php?category=academic&type=contribution">
                      <i class="glyphicon glyphicon-comment"></i><span> Academic Post</span>
                  </a>
              </li>

               <li class="<?php  ;?> treeview">
                  <!-- <a href="studies.php?type=GATE&study=higher studies"> -->
                    <a href="gate_branch.php?type=GATE&study=higher studies">
                      <i class="glyphicon glyphicon-superscript"></i><span>GATE</span>
                  </a>
              </li>
              <li class="<?php  ;?> treeview">
                  <a href="cat_dashboard.php">
                      <i class="glyphicon glyphicon-copyright-mark"></i><span>CAT</span>
                  </a>
              </li>
                  </a>
              </li>
              <li class="<?php  ;?> treeview">
                  <a href="forum-career-information.php">
                      <i class="fa fa-users"></i><span>JOB</span>
                  </a>
              </li>
              <li class="<?php  ;?> treeview">
                  <a href="#">
                      <i class="fa fa-mouse-pointer"></i><span>Help</span>
                  </a>
              </li>
               <li class="<?php  ;?> treeview">
                  <a href="feedback.php">
                      <i class="fa fa-hand-paper-o"></i><span>Feedback</span>
                  </a>
              </li>
          <?php } ?>



      </ul>
    </section>
    <!-- /.sidebar -->

  </aside>