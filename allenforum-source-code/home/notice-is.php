<?php include "../config/session_header.php"; ?>
<?php
$pageTitle = "Notice is  | Allenhouse Group of Colleges";
// $pageFor = "librarian";
include('header.php');?>

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

$activeTabQuestions = "";
$activeTabAskQuestions = "";
$activeTabAnsGot = "";
$activeTabAskedQuestion = "";

/*==========Receptionist=========*/
$noticeTreeTab = 'active';
$activeTabAddNotice = '';
$activeTabViewNotice = 'active';




include('sidebar.php');?>

<!-- Content Wrapper. Contains page content (body)-->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->

    <script type="text/javascript">
        function ShowLoading(e) {
            var div = document.createElement('div');
            var img = document.createElement('img');
            img.src = 'ownImages/library/loading1.gif';
            div.innerHTML = "Processing...<br />";
            div.style.cssText = 'position: fixed; top: 15%; left: 40%; z-index: 5000; width: 422px; text-align: center; ';
            div.appendChild(img);
            document.body.appendChild(div);
            return true;
            // These 2 lines cancel form submission, so only use if needed.
            //window.event.cancelBubble = true;
            //e.stopPropagation();
        }
    </script>
    <!--==================Asked question div=========================================================-->
    <?php
    $getNoticeId = base64_decode($_GET['notice_id']);
    $noticeFetchQuery = $connection->query("SELECT * FROM forum_notices WHERE notice_id = '$getNoticeId' ")
    or die("some error in fetching notices".$connection->error);
    if ($noticeFetchQuery->num_rows) {
        $result = $noticeFetchQuery->fetch_object();
        $noticeis = $result->notice;
    } else{
        $noticeis = 'N/A';
    }
    ?>
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title"><span class="glyphicon glyphicon-pushpin"></span>
                            List of Notices</h3>

                    </div>
                        <div class="box-body">
                            <?php echo $noticeis;?>
                        </div>
                </div>
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
</div>
<!-- /.content-wrapper -->

<?php include('footer.php');?>
