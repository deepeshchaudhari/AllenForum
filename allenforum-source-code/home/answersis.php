<?php include "../config/session_header.php"; ?>

<?php
$pageTitle = "Ansers is.. | Allenhouse Group of Colleges";
include "header.php";?>
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

$activeTabManageFaculty = "";
$activeTabManageFacultyAdd  = "";
$activeTabManageFacultyRemove = "";

$activeTabQuestions = "active";
$activeTabAskQuestions = "";
$activeTabAskedQuestion = "";

?>
<?php include "sidebar.php";?>

<?php
/*
 * Fetch the Answers Details means what ansewer is given by whome
 */
if (isset($_GET['question_id']) && isset($_GET['answered_by'])){

    $questionId = base64_decode($_GET['question_id']);
    $ansGivenBy = base64_decode($_GET['answered_by']); // it containes ID only,not name we need name

    $name = mysql_fetch_array(mysql_query("SELECT * FROM forum_users WHERE user_id = '$ansGivenBy' "));


    $findAnswer = mysql_query("SELECT * FROM forum_answers
   WHERE q_id = '$questionId' AND answered_by = '$ansGivenBy'  ")
    or die("error in answer finding".mysql_error());
    if (mysql_num_rows($findAnswer)){
        $foundAnswerIs = mysql_fetch_array($findAnswer);
        $ans = $foundAnswerIs['answer'];
    } else{
        $ans = 'N/A';
    }
} else{
    header("Location:404.php");
}

?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>
        Question & Answesr
        <small>example</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">UI</a></li>
        <li class="active">Timeline</li>
      </ol>
    </section>
  <div style="padding-left: 10px;padding-right: 10px;">
      <img src="ownImages/other/line.png"  width="100%" height="1"/>
  </div>
    <section class="content">
      <div class="row">
        <div class="col-md-12">
          <ul class="timeline">
            <li class="time-label">
                  <span class="bg-red">
                    10 Feb. 2014
                  </span>
            </li>
              <li>
                  <i class="fa fa-user bg-aqua"></i>

                  <div class="timeline-item">
                      <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>
                      <h3 class="timeline-header"><a href="#"><?php echo "Mr. ". $name['name'];?></a> given your answer</h3>
                      <div class="timeline-body">
                         <?php echo $ans;?>
                      </div>
                  </div>
              </li>
              <!-- END timeline item -->
            <!--<li>
              <i class="fa fa-comments bg-yellow"></i>
              <div class="timeline-item">

                <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>
                <h3 class="timeline-header"><a href="#">Person1 given answer</a></h3>
                <div class="timeline-body">
                  Take me to your leader!
                  Switzerland is small and neutral!
                  We are more like Germany, ambitious and misunderstood!
                </div>
                  <img src="ownImages/other/blue-line-separator.png" width="100%" height="1"/>
                  <span class="time"><i class="fa fa-clock-o"></i> 10 mins ago</span>
                  <h3 class="timeline-header"><a href="#">Person2 given answer</a></h3>
                  <div class="timeline-body">
                      Take me to your leader!
                      Switzerland is small and neutral!
                      We are more like Germany, ambitious and misunderstood!
                  </div>
              </div>
            </li>-->
            <!-- timeline item -->
            <li>
              <i class="fa fa-camera bg-purple"></i>
              <div class="timeline-item">
                <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>
                <h3 class="timeline-header"><a href="#">Your Screenshots</a></h3>
                <div class="timeline-body">
                  <img src="http://placehold.it/150x100" alt="..." class="margin">
                  <img src="http://placehold.it/150x100" alt="..." class="margin">
                  <img src="http://placehold.it/150x100" alt="..." class="margin">
                  <img src="http://placehold.it/150x100" alt="..." class="margin">
                </div>
              </div>
            </li>
            <!-- END timeline item -->
            <li>
              <i class="fa fa-clock-o bg-gray"></i>
            </li>
          </ul>
        </div>
      </div>
    </section>
  </div>

 <?php include "footer.php";?>