<?php include "../config/session_header.php"; ?>
<?php include "../config/configuration.php";?>
<?php include_once "functions/common/Common.php";?>

<?php
$pageTitle = "Shared Questions | Allenhouse Group of Colleges";
include('header.php');?>

<?php
$activeTabDash = "";
$activeLinkDash = "";
?>

<?php include('sidebar.php');?>
<div class="content-wrapper">
    <section class="content">
        <div  class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <div class="tab-content">
                        <div class="box-header">
                            <i class="glyphicon glyphicon-saved"></i>
                            <h3 class="box-title">Shared Questions</h3>
                            <div class="pull-right box-tools">
                               <span>
                                   <img src="ownImages/other/gif_processing.gif" width="30" height="30">
                               </span>
                            </div>
                        </div> <hr/>
                        <?php
                        $sr = 1;
                        $userID = $_SESSION['userId'];
                        $common = new CommonFunctions();
                        $sharedWithList = $common->getQuesSharedListByUserId($connection,$userID,$_SESSION['userrole']);
                       // print_r($sharedWithList->fetch_object());
                        ?>
                        <div class="table-responsive">
                            <table class="table table-stripped" id="sharedQuestions">
                                <thead>
                                <tr>
                                    <th>Sr.</th>
                                    <th>Question Title</th>
                                    <th>Shared With</th>
                                    <th>shared On</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php while ($sharedList = $sharedWithList->fetch_object()){ ?>
                                    <tr>
                                        <td><?php echo $sr;?></td>
                                        <td style='text-align: left;'><a href="my-saved-answer-is.php?ques_id=<?php echo base64_encode($sharedList->q_id)."&q_type=shared&title=".base64_encode($sharedList->questionTitle);?>"><?php echo $sharedList->questionTitle;?></a> </td>
                                        <td style='text-align: left;'>
                                            <?php echo $sharedList->shared_with;?>
                                        </td>
                                        <td style='text-align: left;'><?php if($sharedList->shared_time) echo date('Y-M-d  h:i:s A',strtotime($sharedList->shared_time));?></td>
                                    </tr>
                                <?php $sr++; } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<?php include('footer.php');?>




