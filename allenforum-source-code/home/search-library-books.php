<?php include "../config/session_header.php"; ?>
<?php
$pageTitle = "Search Library Books | Allenhouse Group of Colleges";
include('header.php');?>

<?php  $activeTabDash = "";
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
                            <h3 class="box-title">Search Library Book</h3>
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
                                    <input type="text" id="searchBookKeyword" name="searchBookKeyword" class="form-control" placeholder="Search with Book name,Author,Department..." onkeyup="getbookBySearch();">
                                </div><br/>
                            </div>
                        </div>
                        <center>
                            <img src="ownImages/other/loading/blue_loading.gif" id="book-loader" style="display: none;" width="100" height="100">
                        </center>
                       <div id="load-book-data"></div>
                    </img>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->
<?php include('footer.php');?>
<script type="text/javascript">

   window.onload = function() {
       getbookBySearch();
   };
</script>




