<?php include "../config/session_header.php"; ?>
<?php include "functions/common/Common.php";?>
<?php
$pageTitle = "Trending | Allenhouse Group of Colleges";
include('header.php');
?>
<?php
$activeTabDash = "active";
$activeLinkDash = "active";
include('sidebar.php');
?>
<div class="content-wrapper">
    <section class="content">

        <div class="row">
            <div class="col-lg-12">
                <div class="box box-widget widget-user">
                    <div class="box-header">
                        <a href="forum-discussion-personal.php" data-toggle="tooltip" data-original-title="Back">
                            <img src="ownImages/other/left-arrow.png">
                        </a>
                        <h3 class="box-title pull-right">Discussed List <i class="fa fa-fire"></i></h3>
                    </div>

                    <div class="box-footer">
                        <div class="post">
                            <div class="box-comment">
                                <div class="single-discussion-list">
                                    <div class="row">
                                        <div class="col-lg-12 ">
                                            <div class="form-group">
                                                <input type="text" name="discussionNameSearch" id="discussionNameSearch" class="form-control" onkeyup="getSingleDiscussionMessages();"  placeholder="Search with Title,Message..">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="box-body">
                                        <center>
                                            <img src="ownImages/other/loading/ajax-loader-list.gif" id="loadDiscussionList" style="display: none" />
                                        </center>
                                        <div id="discussion-users-content">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<div class="modal fade" id="modalViewSingleDiscussion" tabindex="-1" role="dialog" aria-labelledby="modalViewSingleDiscussion">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form id="singleDiscussionForm">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="exampleModalLabel"><b>Discuss Personally</b></h4>
                </div>
                <div class="modal-body">
                    <div class="box-body pad">
                        <div class="row">
                            <div class="col-sm-12">
                                <p id="single-discussion-title" class="users-list-name"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <p id="single-discussion-message"></p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
<!--                                <img src="ownImages/other/line.png" width="100%" height="1" />-->
                                <p id="single-discussion-answer"></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-sm btn-danger btn-flat" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php include('footer.php');?>
<script type="text/javascript">


    window.onload = function() {
        getSingleDiscussionMessages();
    };
</script>

