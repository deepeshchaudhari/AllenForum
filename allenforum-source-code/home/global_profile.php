<?php include "../config/session_header.php"; 
       include "../config/config.php";?>
<?php
      $pageTitle = "Welcome in Dashboard | Allenhouse Group of Colleges";
      include('header.php');?>


  <?php
  $activeTabDash = "active";
  $activeLinkDash = "active";
  $activeTabAddBook = "";
  $activeLinkAddBook = "";
  $activeTabBook = "";
  $activeLinkAddBookViewDelete = "";
  $activeLinkUpdateBookStatus = "";

  $activeTabManageStudents  = "";
  $activeTabManageStudentsAdd = "";
  $activeTabManageStudentsRemove = "";

  $activeTabManageFaculty = "";
  $activeTabManageFacultyAdd  = "";
  $activeTabManageFacultyRemove = "";

  $activeTabQuestions = "";
  $activeTabAskQuestions = "";
  $activeTabAnsGot = "";
  $activeTabAskedQuestion = "";

  $activeForumTreeTab = "";
  $facultyLetsAnsTab = "";
  $activeTabSavedAns = "";
  $activeTabLetStart = "";

  $activeTreeTabReception = "";
  $addReceptionistLink = "";

/*------------------------------fetching data of user--------------------------------------*/
  $roll= $_GET["userId"];
  $profile_login = mysql_query("select * from forum_users where user_id = '$roll'  ") or die("Login failed".mysql_error());
   

            /*
             * Now execute the query to select that partcular row for which
             * the above query is satisfied.
             */
            $profile_userRole = mysql_fetch_array($profile_login);
                     
             $_SESSION['puserrole']      = $profile_userRole['role'];
             $_SESSION['puser_program']  = $profile_userRole['user_program'];
             $_SESSION['pprofile']       = $profile_userRole['profile_pic'];
             $_SESSION['pname']          = $profile_userRole['name'];
             $_SESSION['pdept']          = $profile_userRole['department'];
             $_SESSION['puserId']        = $profile_userRole['user_id'];
             $_SESSION['puser_year']     = $profile_userRole['year'];
             $_SESSION['puser_college']  = $profile_userRole['user_college'];
             $_SESSION['puser_description']= $profile_userRole['user_description'];
             $_SESSION['puser_city']       = $profile_userRole['user_city'];
             $_SESSION['puser_state']      = $profile_userRole['user_state'];
             $_SESSION['puser_country']    = $profile_userRole['user_country'];
             $_SESSION['puser_projects_no']= $profile_userRole['user_projects_no'];
             $_SESSION['puser_cover']    = $profile_userRole['user_cover'];

  include('sidebar.php');?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
          Dashboard
        <small>Control panel | Good evening ! <img src="ownImages/other/time/evening-night.png" width="40" height="30"/> </small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>
      <div style="padding-left: 10px;padding-right: 10px;">
          <img src="ownImages/other/line.png"  width="100%" height="1"/>
      </div>
    <!-- Main content -->
    <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box box-widget widget-user">
                        <!-- Add the bg color to the header using any of the bg-* classes -->
                        <div class="widget-user-header bg-black" style="background: url('<?php echo $_SESSION['puser_cover'] ?>') center center;">
                            <h3 class="widget-user-username"><b><?php echo $_SESSION['pname']; ?></b></h3>
                            <h5 class="widget-user-desc">
                             <b> <?php echo $_SESSION['puserrole'];?> 
                              (<?php echo $_SESSION['pdept'];?>, <?php echo $_SESSION['puser_year'];?>th Year)
                            </b>
                            </h5>
                        </div>
                        <div class="widget-user-image">
                            <img class="img-circle" src="<?php echo $_SESSION['pprofile'] ?>" alt="User Avatar">
                        </div>

                        <div class="box-footer">
                            <p class="text-center">
                                <span class="lead"> <?php echo $_SESSION['pname'];?>
                                  <br/>
                                    <?php echo $_SESSION['puserrole'] ?> :
                                    <?php echo $_SESSION['puser_program'];?>
                                    <?php echo $_SESSION['pdept'];?>,
                                    <?php echo $_SESSION['puser_year'];?>th Year  
                                    <?php echo $_SESSION['puser_college'];?>
                                    <br/></span>
                                    <?php echo $_SESSION['puser_city'];?>, 
                                    <?php echo $_SESSION['puser_state'];?>, 
                                    <?php echo $_SESSION['puser_country'];?>
                                <img src="ownImages/other/line.png"  width="100%" height="1"/>
                            </p>
                               <center>
                                 <p class="description" style="font-size: 15px">
                                     <?php echo $_SESSION['puser_description'];?>
                                 </p>
                                <span class="lead" style="font-weight: bolder">...</span>
                                <a href="edit-profile.php?profile=userIntroduction&id=<?php echo $_SESSION['userId'];?>">
                                    <i class="glyphicon glyphicon-pencil fa-2x" > </i>
                                </a>
                             </center>
                        </div>
                    </div>
                </div>
            </div>
           <!--==========================// profile part 1 Description,Intro==============================-->




            <div class="row">
                <div class="col-lg-12">
                    <div class="box box-widget widget-user">
                        <div class="box-footer">
                           <div class="row">
                               <div class="col-lg-12">
                                   <div class="exp-col-1-heading">
                                       <span class="lead">
                                           Stats
                                       </span>
                                   </div>
                                   <div class="exp-col-2-heading">
                                      <a href="">
                                          <img src="ownImages/student/profile/add-icon.png" width="40" height="40">
                                      </a>
                                   </div>
                               </div>
                           </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <table>
                                        <tr>
                                 <div class="box-footer no-padding">
                                   <ul class="nav nav-stacked">

                                     <li><a href="#">Projects <span class="pull-right badge bg-green"><?php echo $_SESSION['puser_projects_no'] ?></span></a></li>
                                     <li><a href="#">Questions & Answer <span class="pull-right badge bg-red">55</span></a></li>
                                     <li><a href="#">Completed Projects <span class="pull-right badge bg-green">DESCRIPTION</span><span class="pull-right badge bg-red">3</span></a></li>
                                     <li><a href="#">Followers <span class="pull-right badge bg-red">842</span></a></li>
                                     <li><a href="#">See Full Resume <span class="pull-right badge bg-green">CLICK HERE</span></a></li>
                                     <li>
                                     </br>
                                       <center>
                                         <a href="#"><img src="ownImages/student/profile/edit-icon.png" width="30" height="30"></a>
                                       </center>
                                     </li>
                                   </ul>
                                 </div>
                                        </tr>
                                    </table>
                                    <img src="ownImages/other/line.png" width="100%" height="1"/>
                                   </div>
                                </div>
                               </div>
                            </div>
                          </div>
                      </div>
             <!--=========================//Profile part 2 Stats=======================================-->

                 <div class="row">
                   <div class="col-md-12">
                      <div class="box box-widget widget-user">
                        <div class="box-footer">
                           <div class="row">
                               <div class="col-lg-12">
                                   <div class="exp-col-1-heading">
                                       <span class="lead">
                                           Experience
                                       </span>
                                   </div>
                                   <div class="exp-col-2-heading">
                                      <a href="">
                                          <img src="ownImages/student/profile/add-icon.png" width="40" height="40">
                                      </a>
                                   </div>
                               </div>
                           </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <table>
                                        <tr>
                                            <td>
                                                <img src="ownImages/student/profile/user-experience-icon.png" width="50" height="70"/>
                                            </td>
                                            <td>
                                               <p style="vertical-align:text-top">
                                                   <span class="lead">Freasher</span><br/>
                                                   <?php echo $_SESSION['puserrole'];?> : 
                                                   <?php echo $_SESSION['puser_program'];?> 
                                                   <?php echo $_SESSION['pdept'];?>,
                                                   <?php echo $_SESSION['puser_year'];?>th Year<br/>
                                                   <b>PHP Web Developer in Intouch</b>
                                               </p>
                                            </td>
                                            <div class="exp-col-2-heading">
                                                <a href="">
                                                    <img src="ownImages/student/profile/edit-icon.png" width="30" height="30">
                                                </a>
                                            </div>
                                        </tr>
                                    </table>
                                    <img src="ownImages/other/line.png" width="100%" height="1"/>
                                   </div>
                                </div>
                               </div>
                             </div>
                          </div>
                        </div>
                <!--==========================//Profile Part 3 Experiences====================-->

                 <div class="row">
                   <div class="col-md-12">
                      <div class="box box-widget widget-user">
                        <div class="box-footer">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="exp-col-1-heading">
                                       <span class="lead">
                                           Education
                                       </span>
                                    </div>
                                    <div class="exp-col-2-heading">
                                        <a href="">
                                            <img src="ownImages/student/profile/add-icon.png" width="40" height="40">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <table>
                                        <tr>
                                            <td>
                                                <img src="ownImages/student/profile/education-icon.png" width="50" height="50">
                                            </td>
                                            <td>
                                                <p style="vertical-align:text-top;text-transform: uppercase">
                                                    <span class="lead"><?php echo $_SESSION['puser_college'];?></span><br/>
                                                    <span>Delhi,UP</span><br/>
                                                    <b>2014-18</b><br/>
                                                </p>
                                            </td>
                                            <div class="exp-col-2-heading">
                                                <a href="">
                                                    <img src="ownImages/student/profile/edit-icon.png" width="30" height="30">
                                                </a>
                                            </div>
                                        </tr>
                                    </table>
                                    <img src="ownImages/other/line.png" width="100%" height="1"/>
                                </div>
                                <div class="col-lg-12">
                                    <table>
                                        <tr>
                                            <td>
                                                <img src="ownImages/student/profile/education-icon.png" width="50" height="50">
                                            </td>
                                            <td>
                                                <p style="vertical-align:text-top;text-transform: uppercase">
                                                    <span class="lead"><b>Saraswati Vidya Mandir</b></span><br/>
                                                    <span>Kanpur,Railway,UP</span><br/>
                                                    <b>2010-14</b><br/>
                                                </p>
                                            </td>
                                            <div class="exp-col-2-heading">
                                                <a href="">
                                                    <img src="ownImages/student/profile/edit-icon.png" width="30" height="30">
                                                </a>
                                            </div>
                                        </tr>
                                    </table>
                                    <img src="ownImages/other/line.png" width="100%" height="1"/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!--===========================// Profile Part 4 Education=======================-->
    </section>
  </div>



  <?php include('footer.php');?>
