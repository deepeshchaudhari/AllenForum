<?php include "../config/session_header.php"; ?>
<?php include "../config/configuration.php";?>
<?php include_once "functions/common/Common.php";?>
<?php include_once "functions/library/Library.php";?>

<?php
$pageTitle = "Book Entry  | Allenhouse Group of Colleges";
include('header.php');
$activeTabDash = "";
$activeLinkDash = "";
?>
<?php
$library = new Library();
$bookSrNumber = $library->getNewBookSrNo($connection);
?>

<?php include('sidebar.php');?>
<div class="content-wrapper">
    <section class="content">
        <div  class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <div class="tab-content" >
                        <div class="box-header">
                            <i class="glyphicon glyphicon-saved"></i>
                            <h3 class="box-title">Add Library Books</h3>
                            <div class="pull-right box-tools">
                               <span><img src="ownImages/other/gif_processing.gif" width="30" height="30"></span>
                            </div>
                        </div> <img src="ownImages/other/line.png" width="100%" height="1"/>
                    </div>
                    <div class="register-box" style="margin-top: 0;">
                        <div class="register-box-body">
                            <p class="login-box-msg"><b>Search Book By Id</b></p>
                            <form id="bookEntryExitForm">
                                <div class="input-group input-group">
                                    <input type="number"  name="bookId" id="bookId"  placeholder="Book ID" class="form-control"  required="required" class="form-control">
                                    <span class="input-group-btn"><button type="submit" name="search_bookBtn" id="search_bookBtn" class="btn btn-info btn-flat">Find <i class="fa fa-search"></i> </button></span>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div  id="bookEntryExitDiv" style="margin-left: 8px;margin-top: 8px;">
                    </div>
                </div>
            </div>
        </div>

    </section>
</div>

<!--
1. This Page uses AJAX functionlity so please go through to functions/library/
2. and javaScript/library/

-->

<?php include('footer.php');?>




