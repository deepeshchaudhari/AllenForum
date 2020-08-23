<?php include "../config/session_header.php"; ?>
<?php
$pageTitle = "Edit Profile | Allenhouse Group of Colleges";
include('header.php');?>


<?php
$activeTabDash = "active";
$activeLinkDash = "active";
include('sidebar.php');?>


    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box box-widget widget-user">
                        <div class="box-header">
                            <i class="fa fa-users"></i>
                            <h3 class="box-title">Active Users  </h3>
                            <div class="pull-right box-tools">
                                   <span>
                                       <img src="ownImages/other/gif_processing.gif" width="30" height="30">
                                   </span>
                            </div>
                        </div>
                        <div class="box-footer">
                            <div class="post">
                                <div class="user-block">
                                    <div class="row">
                                        <div class="col-xs-3 border-right">
                                            <div class="description-block">
                                                <h5 class="description-header">
                                                    <i class="fa fa-saple">
                                                        <img src="ownImages/other/user-icon2.png" width="20" height="20" />
                                                    </i>
                                                </h5>
                                                <span class="description-text">
                                                  Ankit
                                                </span>
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
<?php include('footer.php');?>
