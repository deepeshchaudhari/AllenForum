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
                    <div class="box-footer">
                        <div class="post">
                            <div class="nav-tabs-custom">
                                <ul class="nav nav-tabs">
                                    <li class="<?php if ($_GET['tab'] == 'inbox'){echo 'active';}?>"><a href="#tab_1" data-toggle="tab">Inbox</a></li>
<!--                                    <li class="--><?php //if ($_GET['tab'] == 'discussed_active'){echo 'active';}?><!--"><a href="#tab_2" data-toggle="tab">Discussed</a></li>-->
                                </ul>
                            </div>
                            <div class="tab-content">
                                <div class="tab-pane <?php if ($_GET['tab'] == 'inbox'){echo 'active';}?>" id="tab_1">
                                    <div class="row">
                                        <div class="col-lg-12 ">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                                <input type="text" name="inboxMessageSearch" id="inboxMessageSearch" class="form-control" onkeyup="getSingleDissInboxMessages();"  placeholder="Search with Title,Message..">
                                            </div>
                                        </div>
                                    </div><br/>
                                    <center>
                                        <img src="ownImages/other/loading/blue_loading.gif" width="100" height="100" id="messageLoader" style="display: none;">
                                    </center>
                                    <div id="personal-msg-list"></div>
                                </div>
                               <!-- <div class="tab-pane <?php /*if ($_GET['tab'] == 'discussed_active'){echo 'active';}*/?>" id="tab_2">
                                    <div class="row">
                                        <div class="col-lg-12 ">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                                <input type="text" name="discussedMessageSearch" id="discussedMessageSearch" class="form-control" onkeyup="getSingleDissInboxMessages();"  placeholder="Search with Title,Message..">
                                            </div>
                                        </div>
                                    </div><br/>
                                    <center>
                                        <img src="ownImages/other/loading/blue_loading.gif" width="100" height="100" id="messageLoader2" style="display: none;">
                                    </center>
                                    <div id="personal-msg-discussed"></div>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
<?php include ("modals/common/modal-give-ans-personally.php");?>
<?php include ("modals/common/modal-view-answer-personally.php");?>
<?php include('footer.php');?>
<script type="text/javascript">
    window.onload = function() {
        getSingleDissInboxMessages();
    };
</script>
