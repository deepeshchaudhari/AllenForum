<?php include "../config/session_header.php"; ?>
<?php include_once "functions/common/Common.php";?>
<?php
$pageTitle = "Welcome in Dashboard | Allenhouse Group of Colleges";
include('header.php');
$activeTabDash = "active";
$activeLinkDash = "active";
include('sidebar.php');

$common = new CommonFunctions();
if ($common->getGreetings() == "GM"){
    $greetingMessage = "Good Morning !";
    $icon = "ownImages/wheather/morning.png";

} else if ($common->getGreetings() == "GA"){
    $greetingMessage = "Good Afternoon !";
    $icon = "ownImages/wheather/aftenoon.png";
}
else if ($common->getGreetings() == "GE"){
    $greetingMessage = "Good Evening !";
    $icon = "ownImages/wheather/evening.png";
}
else if ($common->getGreetings() == "GN"){
    $greetingMessage = "Good Night !";
    $icon = "ownImages/other/time/evening-night.png";
}

?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1> Dashboard<small>Control panel | <?php echo $greetingMessage;?><img src="<?php echo $icon;?>" width="40" height="30"/> </small></h1>
        <div style="padding-left: 10px;padding-right: 10px;"> <img src="ownImages/other/line.png"  width="100%" height="1"/> </div>
        <?php
        if ($_SESSION['userrole'] == "librarian"){
            echo ' <br/>
            <div class="librarian-dashsearch" style="display: none;">
                <div class="form-group">
                    <select name="librarybookCategory" id="librarybookCategory" class="form-control" onchange="getLibraryDasboardData();">
                        <option value="">Select Category</option>
                        <option value="Applied Science & Humanities">Applied Science & Humanities</option>
                        <option value="Computer Science">Computer Science</option>
                        <option value="Electronics Communication">Electronics Communication</option>
                        <option value="Management">Management</option>
                        <option value="Mechanical Engineering">Mechanical Engineering</option>
                        <option value="Default Category">Default Category</option>
                    </select>
                 </div>
             </div> ';
        } else {
        ?>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-home"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
        <?php } ?>
    </section>

    <section class="content">

        <?php
        if ( $_SESSION['userrole'] == "librarian"){
                include "content.inc.dashboard/forum-librarian-dashboard.php";
            }
        else if ($_SESSION['userrole'] == "admin"){
                include "content.inc.dashboard/forum-admin-dashbord.php";
        }
        else if ($_SESSION['userrole'] == "faculty"){
               include "content.inc.dashboard/forum-faculty-dashboard.php";
        }
        else if ($_SESSION['userrole'] == "receptionist"){
             include "content.inc.dashboard/forum-receptionist-dashboard.php";
        }
        else{
          // means for students
            include "content.inc.dashboard/forum-student-dashboard.php";
        }
        ?>

    </section>
  </div>

<?php include('footer.php');?>
