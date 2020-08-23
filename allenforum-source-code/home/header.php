<?php //include "../config/config.php";?>
<?php include "../config/configuration.php";?>
<?php include "../config/constants.php";?>
<?php include_once "functions/common/Common.php";?>


<?php
if ( !(isset($_SESSION['loginId'])) ) {
    header('Location:logged-out.php?action=logged-out&status=false');

}

if (isset($_SESSION['loginId'])) {
  // get logged in user details
  $common = new CommonFunctions();
  $user = $common->getLoggedInUserDetails($connection,$_SESSION['loginId'],$_SESSION['userrole']);
  if ($user->num_rows > 0) {
    $userDetails = $user->fetch_object();
    $name = $userDetails->login_name;
    $profile = $userDetails->login_profile;
    $login_department = $userDetails->login_department;
    if (isset($userDetails->department_id)) { // since it is not availble in admin login
        $departmentID = $userDetails->department_id;
    }
    $_SESSION['userEmail'] = $userDetails->login_email;
    $_SESSION['userId'] = $userDetails->userId;
  }

}

?>
<!--
  Project    : Online Discussion Forum !
  Plateform  : Web Based
  Started at :  22/09/2017
  Team       : =====================================
                * Ankit kumar
                * Deepesh Chaudhari
                * Sweety Singh
                * Shweta Gautam
               =====================================
-->
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $pageTitle;?></title>
  <!-- Tell the browser to be responsive to screen width -->
    <?php if( basename($_SERVER['PHP_SELF']) == 'view-library-books.php'){ ?>

    <?php } else{ ?>
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <?php }?>
    <link rel="shortcut icon" href="ownImages/other/allenlogo.png">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/iCheck/flat/blue.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="plugins/morris/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="plugins/jvectormap/jquery-jvectormap-1.2.2.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="plugins/datepicker/datepicker3.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="plugins/select2/select2.min.css">

    <link rel="stylesheet" href="mycss/studentprofile.css"/>
    <link rel="stylesheet" href="mycss/faculty_section.css"/>
    <link rel="stylesheet" href="mycss/mywidgets.css"/>
    <script src="https://cdn.ckeditor.com/4.8.0/standard/ckeditor.js"></script>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->
    <a href="dashboard.php" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>Allen</b>FORUM</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>Allen</b>FORUM</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
            <li class="dropdown notifications-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                    <?php echo strtoupper($_SESSION['userrole']);?>
                    <sub></sub>
                </a>
            </li>
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="<?php if ($_SESSION['userrole'] == 'admin'){ if ($profile) echo '../'.APROFILE_BASEURL.$profile; else echo DEFAULT_USER_PIC; } else if($_SESSION['userrole'] == 'student'){  if ($profile) echo '../'.SPROFILE_BASEURL.$profile; else echo DEFAULT_USER_PIC;} else if($_SESSION['userrole'] == 'faculty'){ if ($profile) echo '../'.FPROFILE_BASEURL.$profile; else echo DEFAULT_USER_PIC ;} else if($_SESSION['userrole'] == 'receptionist'){ if ($profile) echo '..'.RPROFILE_BASEURL.$profile; else echo DEFAULT_USER_PIC ;} else if($_SESSION['userrole'] == 'librarian'){ if ($profile) echo '../'.LPROFILE_BASEURL.$profile; else echo DEFAULT_USER_PIC ;} ?>" class="user-image" alt="User Image">
              <span class="hidden-xs"><?php echo ucwords($name);?></span>
                <sub><?php echo $login_department;?></sub>
            </a>
            <ul class="dropdown-menu">
              <li class="user-header">
                <img src="<?php if ($_SESSION['userrole'] == 'admin'){ if ($profile) echo '../'.APROFILE_BASEURL.$profile; else echo DEFAULT_USER_PIC;} else if($_SESSION['userrole'] == 'student'){ if ($profile) echo '../'.SPROFILE_BASEURL.$profile; else echo DEFAULT_USER_PIC ;} else if($_SESSION['userrole'] == 'faculty'){ if ($profile) echo '../'.FPROFILE_BASEURL.$profile; else echo DEFAULT_USER_PIC ;} else if($_SESSION['userrole'] == 'receptionist'){ if ($profile) echo '..'.RPROFILE_BASEURL.$profile; else echo DEFAULT_USER_PIC ;}else if($_SESSION['userrole'] == 'librarian'){ if ($profile) echo '../'.LPROFILE_BASEURL.$profile; else echo DEFAULT_USER_PIC ;} ?>" class="img-circle" alt="User Image">
                <p>
                  <?php echo ucwords($name);?> - <?php echo $_SESSION['userrole'];?>
                  <small>Allenhouse Group of Colleges</small>
                </p>
              </li>

              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                <a href="<?php if($_SESSION['userrole'] == 'student'){ echo "user-profile.php?userId=".base64_encode($_SESSION['userId']);} else if ($_SESSION['userrole'] == 'admin'){echo 'admin-profile.php';} else if ($_SESSION['userrole'] == 'faculty'){echo 'faculty-profile.php';}?>" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="logged-out.php?action=logout&login_status=false" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
          <!-- Control Sidebar Toggle Button -->
          <li>
            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  
