<?php include "../config/session_header.php"; ?>
<?php
$pageTitle = "Questions Asked  | Allenhouse Group of Colleges";
include('header.php');?>

<?php  $activeTabDash = "";
$activeLinkDash = "";
?>

<?php include('sidebar.php');?>


<?php
/* Get the Question ID from URL */
if (isset($_GET['ques']) && $_GET['ques'] != '' && $_GET['ques'] != null){
    $quesId = base64_decode($_GET['ques']);

} //else{
//    header("Location:404.php");
//}
/* Display the question asked by the student, to this faculty */

$userIn_department = $_SESSION['dept'];    // let me
$userRole          = $_SESSION['userrole']; // student
$shareQues = "SELECT DISTINCT asked_by FROM forum_questions 
                       WHERE (department = '$userIn_department' OR department = 'all')
                       AND (to_whome = '$userRole' OR to_whome = 'all') AND (asked_by != '".$_SESSION['userId']."')
                       ORDER BY q_id DESC";
echo $shareQues; die();
$shareQuesResult = $connection->query($shareQues);
?>

<div class="content-wrapper">
    <section class="content">
        <div  class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <div class="tab-content">
                        <div class="box-header">
                            <i class="glyphicon glyphicon-saved"></i>
                            <h3 class="box-title">Saved Answres</h3>
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                   <span>
                                       <img src="ownImages/other/gif_processing.gif" width="30" height="30">
                                   </span>
                            </div>
                        </div> <hr/>

                        <div class="table-responsive">
                            <table class="table table-stripped">
                                <thead>
                                <tr style="background-color: #00E676;color: white;border: 1px solid greenyellow ">
                                    <th>Sr.</th>
                                    <th>Select</th>
                                    <th>Name</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if ($shareQuesResult->num_rows > 0 ) {
                                    $sr = 1;
                                    while ($shareWith = $shareQuesResult->fetch_object()) {
                                        $idOfUser = $shareWith->asked_by;// roll no. or ID
                                        /* find out the name and from main table */
                                        $name = $connection->query("SELECT name FROM forum_users WHERE user_id = '$idOfUser' ")->fetch_object()->name
                                        or die("Name not found".$connection->error);
                                        ?>
                                        <form action="scripts/common/share/ques-share-script.php"
                                        method="post">
                                        <tr>
                                            <td style="border: 1px solid greenyellow;"><?php echo $sr; ?></td>
                                            <td style="border: 1px solid greenyellow;">
                                                <input type="hidden" name="q_id"  value="<?php echo $quesId;?>"/>
                                                <input type="checkbox" name="checkUsersToShare[<?php echo $idOfUser;?>]" id="checkUsersToShare[<?php echo $idOfUser;?>]" value="<?php echo $idOfUser;?>" />
                                            </td>
                                            <td style="border: 1px solid greenyellow;"><?php echo $name; ?></td>
                                        </tr>
                                        <?php $sr++;
                                    } ?>
                                    <tr>
                                        <td colspan="3">
                                            <button type="submit" name="shareQuesBtn" class="btn btn-block" style="background-color: #00E676;color: white;" >Share
                                                <i class="glyphicon glyphicon-send"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    </form>
                                <?php } else{
                                    echo "N/A";
                                }?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->

<?php include('footer.php');?>




