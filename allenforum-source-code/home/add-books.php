<?php include "../config/session_header.php"; ?>
<?php
 include "../config/configuration.php";
 include_once "functions/common/Common.php";
 include_once "functions/library/Library.php";
?>
<?php
$pageTitle = "Questions Asked  | Allenhouse Group of Colleges";
include('header.php');?>

<?php  $activeTabDash = "";
$activeLinkDash = "";

?>
<?php
$library = new Library();
$bookSrNumber = $library->getNewBookSrNo($connection)->fetch_object()->newBookId +1;
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
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                   <span>
                                       <img src="ownImages/other/gif_processing.gif" width="30" height="30">
                                   </span>
                            </div>
                        </div>  <img src="ownImages/other/line.png" width="100%" height="1"/>
                       <div id="submitAddBookLoading" style="display: none;">
                           <center><img src="ownImages/library/loading1.gif"></center>
                       </div>
                        <form id="addBookForm">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Book Id</label>
                                    <input type="text" name="book_id" id="book_id" value="<?php echo $bookSrNumber;?>" disabled   class="form-control" placeholder="Book Id">
                                </div>
                                <div class="col-md-3">
                                    <label>Book Title</label>
                                    <input type="text" name="book_name" id="book_name" required  class="form-control" placeholder="Book Title">
                                </div>
                                <div class="col-md-3">
                                    <label>Book Author</label>
                                    <input type="text" name="book_author" id="book_author" required class="form-control" placeholder="Book Author">
                                </div>
                                <div class="col-md-3">
                                    <label>Category</label>

                                    <select name="book_category" id="book_category" required class="form-control" >
                                        <option value="" selected disabled>--SELECT--</option>
                                        <?php
                                        $common = new CommonFunctions();
                                        $categories = $common->getDepartments($connection);
                                        while ($category = $categories->fetch_object()) {?>
                                        <option value="<?php echo $category->department_name;?>">
                                            <?php
                                            if ($category->department_name == 'CSE') echo 'Computer Science & Engineering';
                                            elseif ($category->department_name == 'EC') echo 'Electronics & Communication';
                                            elseif ($category->department_name == 'ME') echo 'Mechanical Engineering';
                                            elseif ($category->department_name == 'EN') echo 'Electrical & Electronics Engineering';
                                            elseif ($category->department_name == 'CIVIL') echo 'Civil Engineering';
                                            elseif ($category->department_name == 'BBA') echo 'Bachelor of Business Administration';
                                            elseif ($category->department_name == 'BCA') echo 'Bachelor of Computer Application';
                                            ?>
                                        </option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                   <div class="form-group">
                                       <label>Book Year</label>
                                       <input type="text" name="book_year"  id="book_year" required class="form-control" placeholder="Book Year">
                                   </div>
                                </div>
<!--                                <div class="col-md-3">-->
<!--                                    <div class="form-group">-->
<!--                                        <label>Book Quantity</label>-->
<!--                                        <input type="number" name="book_qty" id="book_qty" required class="form-control" placeholder="Book Quantity">-->
<!--                                    </div>-->
<!--                                </div>-->
                            </div>

                            <div class="row">
                                <div class="col-md-3"><br/>
                                    <button type="submit"  name="addBookSingleBtn" class="btn btn-success" ><i class="fa fa-check-circle"></i> Add Book</button>
                                </div>
                            </div>
                        </form><br/>
                       <!-- <label>Upload CSV</label>
                        <img src="ownImages/other/line.png" width="100%" height="1"/>
                        <form action="" method="post" enctype="multipart/form-data" runat="server"  onsubmit="ShowLoading()">
                            <div class="row">
                                <div class="col-md-3">
                                    <input type="file" name = "bookSheet" required class="form-control"/>
                                </div>
                                <div class="col-md-3">
                                    <button type="submit" name="addBookWithCSVBtn" class="btn btn-success" formaction="scripts/library/add-book-script.php"><i class="fa fa-upload"></i> Upload </button>
                                </div>
                                <?php if (isset($_SESSION['bookSheetUploadError'])){ ?>
                                <div class="col-md-3">
                                    <span class="badge" style="background-color: red">
                                       <?php echo $_SESSION['bookSheetUploadError'];?>
                                    </span>
                                </div>
                                <?php } unset($_SESSION['bookSheetUploadError']) ?>
                            </div>
                        </form>-->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->

<?php include('footer.php');?>




