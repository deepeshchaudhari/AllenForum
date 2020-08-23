<?php include "../config/session_header.php"; ?>
<?php
$pageTitle = "Block Users  | Allenhouse Group of Colleges";
include('header.php');?>

<?php  $activeTabDash = "";
$activeLinkDash = "";
?>
    <script type="text/javascript">
        function ShowLoading(e) {
            var div = document.createElement('div');
            var img = document.createElement('img');
            img.src = 'ownImages/library/loading1.gif';
            div.innerHTML = "Processing...<br />";
            div.style.cssText = 'position: fixed; top: 15%; left: 40%; z-index: 5000; width: 200px; text-align: center; ';
            div.appendChild(img);
            document.body.appendChild(div);
            return true;
            // These 2 lines cancel form submission, so only use if needed.
            //window.event.cancelBubble = true;
            //e.stopPropagation();
        }
    </script>
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
                                <!-- tools box -->
                                <div class="pull-right box-tools">
                                   <span>
                                       <img src="ownImages/other/gif_processing.gif" width="30" height="30">
                                   </span>
                                </div>
                            </div> <hr/>

                            <div class="row">
                                <div class="col-md-12">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                        <input type="text" id="savedAnsKeyWord" class="form-control" placeholder="Start Typing Something...">
                                    </div><br/>
                                </div>
                            </div>
                            <?php
                            $sharedQuestions = $connection->query("SELECT * FROM 
                            forum_ques_share WHERE shared_by = '".$_SESSION['userId']."'  ");
                            ?>

                            <div class="table-responsive">
                                <table class="table table-stripped">
                                    <thead>
                                      <tr>
                                          <th>Sr.No</th>
                                          <th>Ques.Title</th>
                                          <th>Shared With</th>
                                      </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    $sr = 1;
                                    while ($mySharedQues = $sharedQuestions->fetch_object()){
                                        /* find out Question info */
                                        $sharedWith = $mySharedQues->shared_with;
                                        $namesOf = $connection->query("SELECT * FROM forum_users WHERE user_id = '$sharedWith' ")->fetch_object()->name;
                                        $questionInfo = $connection->query("SELECT * FROM 
                                       forum_questions WHERE q_id = $mySharedQues->q_id  ")->fetch_object() or die("Error:".$connection->error);
                                        ?>
                                        <tr>
                                            <td><?php echo $sr;?></td>
                                            <td><?php echo $questionInfo->title;?></td>
                                            <td><?php echo $namesOf;?></td>
                                        </tr>
                                    <?php
                                        $sr++;
                                    }
                                    ?>
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

<?php
if (isset($_POST['blockUsersBtn'])){
    $id = $_POST['userId'];
    echo $id;
}




