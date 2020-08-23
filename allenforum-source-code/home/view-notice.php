<?php include "../config/session_header.php"; ?>
<?php
$pageTitle = "View  Notice  | Allenhouse Group of Colleges";
include('header.php');
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
                            <i class="glyphicon glyphicon-paperclip"></i>
                            <h3 class="box-title">List Of Notices   </h3>
                            <span> <a href="add-notice.php">  <i class="glyphicon glyphicon-plus"></i> </a>
                            </span>
                            <div class="pull-right box-tools">
                               <span>
                                   <img src="ownImages/other/gif_processing.gif" width="30" height="30">
                               </span>
                            </div>
                        </div> <hr/>

                        <div class="table-responsive">
                            <table class="table table-stripped" id="noticeTable">
                                <thead>
                                <tr style="background-color: #76b8ff;color: white;">
                                    <th>Sr.</th>
                                    <th>Title</th>
                                    <th>Notice For</th>
                                    <th>Date</th>
                                    <th>Edit</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                /*
                                 * In this Query we Fetch the notice from database
                                 */
                                $noticeFetchQuery = $connection->query("SELECT * FROM forum_notices ORDER BY notice_id DESC ")
                                or die("some error in fetching notices".$connection->error);
                                if ($noticeFetchQuery->num_rows > 0) {
                                    $noticeSerial = 1;
                                    while ($notices = $noticeFetchQuery->fetch_object()) { ?>
                                        <tr>
                                            <td><?php echo $noticeSerial; ?></td>
                                            <td><a href="notice-is.php?notice_id=<?php echo base64_encode($notices->notice_id); ?> "><?php echo $notices->notice_subject; ?></a></td>
                                            <td><?php echo $notices->permission; ?></td>
                                            <td><?php echo $notices->date_time; ?></td>
                                            <td><a href="edit-notice.php?id=<?php echo base64_encode($notices->notice_id); ?>" title="Edit Notice"><i class="glyphicon glyphicon-pencil"></i> </a></td>
                                        </tr>
                                        <?php $noticeSerial++;
                                    }
                                } ?>
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




