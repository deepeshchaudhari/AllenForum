<?php include "../config/session_header.php"; ?>
<?php include_once "functions/student/Students.php";?>
<?php include_once "functions/common/Common.php";?>
<?php include_once "functions/faculty/Faculty.php"?>
<?php
$pageTitle = "Questions Asked  | Allenhouse Group of Colleges";
include('header.php');?>

<?php
$activeTabDash = "";
$activeLinkDash = "";
?>

<?php include('sidebar.php');?>

<div class="content-wrapper">
    <section class="content">
      <?php include "content.inc/forum-content.php";?>
<!-- </section>-->
</div>

<?php
/* this session is from login-ajax-request.php */
  if (isset($_SESSION['user_modal_popup'])) {
      include('modals/student/modal-automatic-load.php');
      unset($_SESSION['user_modal_popup']);
  }
 ?>
<?php include('footer.php');?>




