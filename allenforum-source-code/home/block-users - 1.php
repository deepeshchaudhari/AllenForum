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
                            <h3 class="box-title">Saved Answres</h3>
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
                        $students = $connection->query("SELECT * FROM forum_users WHERE role = 'student' ");

                        ?>

                        <div class="table-responsive">
                            <table class="table table-stripped">
                                <thead>
                                <tr style="background-color: #C51162;color: white">
                                    <th style="border: 1px solid #C51162;">Sr.</th>
                                    <th style="border: 1px solid #C51162;">Roll No.</th>
                                    <th style="border: 1px solid #C51162;">Name</th>
                                    <th style="border: 1px solid #C51162;">Program</th>
                                    <th style="border: 1px solid #C51162;">Branch</th>
                                    <th style="border: 1px solid #C51162;">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php $sr = 1 ;
                                  while ($student = $students->fetch_object()){ ?>
                                    <tr>
                                        <td style="border: 1px solid #C51162;"><?php echo $sr;?></td>
                                        <td style="border: 1px solid #C51162;"><?php echo $student->user_id;?></td>
                                        <td style="border: 1px solid #C51162;"><?php echo $student->name;?></td>
                                        <td style="border: 1px solid #C51162;"><?php echo $student->user_program;?></td>
                                        <td style="border: 1px solid #C51162;"><?php echo $student->department;?></td>
                                        <form action="scripts/block-unblock-user-script.php" method="post" runat="server"  onsubmit="ShowLoading()">
                                            <input type="hidden" name="userId" value="<?php echo base64_encode($student->user_id);?>"/>
                                            <input type="hidden" name="blocked_by" value="<?php echo base64_encode($_SESSION['userId']);?>"/>


                                            <td style="border: 1px solid #C51162">
                                            <?php
                                            /* Check if the user is blocked or not */
                                            $checkBlocked = $connection->query("SELECT * FROM 
                                            forum_users WHERE user_id = '$student->user_id' AND block = '0' ")
                                            or die("Error in block".$connection->error);
                                            if ($checkBlocked->num_rows > 0){ ?>
                                                <input type="image" name="UnblockUsersBtn" value="Unblock" src="ownImages/other/lock.png"  width="30" height="30"/>
                                            <?php } else{ ?>
                                                <input type="image" name="blockUsersBtn"  value="block"  src="ownImages/other/unlock.png"  width="30" height="30"/>
                                           <?php }
                                            ?>


                                        </td>
                                        </form>
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
<!-- /.content-wrapper -->

<?php include('footer.php');?>

<?php
if (isset($_POST['blockUsersBtn'])){
   $id = $_POST['userId'];
   echo $id;
}




