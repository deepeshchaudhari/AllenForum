<?php include "../config/session_header.php"; ?>
<?php
$pageTitle = "Questions Asked  | Allenhouse Group of Colleges";
include('header.php');?>

<?php  $activeTabDash = "";
$activeLinkDash = "";

?>

<?php include('sidebar.php');?>
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

<?php
if (isset($_GET['edit']) && $_GET['edit'] != '' && $_GET['edit'] != null){
    $bookId =  base64_decode($_GET['edit']);
    $getBookQuery = $connection->query("SELECT * FROM forum_library WHERE book_id  = '$bookId'  ")
    or die('error in details finding'.$connection->error);
    if ($getBookQuery->num_rows > 0) {
        $getBookDetails = $getBookQuery->fetch_object();
    } else{
        header("Location:404.php");
    }
} else{
    header("Location:404.php");
}
?>

<div class="content-wrapper">
    <section class="content">
        <div  class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <div class="tab-content">
                        <div class="box-header">
                            <i class="glyphicon glyphicon-saved"></i>
                            <h3 class="box-title">Edit Library Books</h3>
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                   <span>
                                       <img src="ownImages/other/gif_processing.gif" width="30" height="30">
                                   </span>
                            </div>
                        </div>  <img src="ownImages/other/line.png" width="100%" height="1"/>
                        <form action="" method="post" runat="server"  onsubmit="ShowLoading()">
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Book Id</label>
                                    <input type="text" name="book_id" disabled value="<?php echo $getBookDetails->book_id;?>" required  class="form-control" placeholder="Book Id">
                                </div>
                                <div class="col-md-3">
                                    <label>Book Title</label>
                                    <input type="text" name="book_name" value="<?php echo $getBookDetails->book_name;?>" required class="form-control" placeholder="Book Title">
                                </div>
                                <div class="col-md-3">
                                    <label>Book Author</label>
                                    <input type="text" name="book_author" value="<?php echo $getBookDetails->book_author;?>" required class="form-control" placeholder="Book Author">
                                </div>
                                <div class="col-md-3">
                                    <label>Category</label>
                                    <select name="book_category" class="form-control" required="required">
                                        <option value="<?php echo $getBookDetails->book_category;?>" selected ><?php echo $getBookDetails->book_category;?></option>
                                        <option value="CSE">CSE</option>
                                        <option value="EN">EN</option>
                                        <option value="EC">EC</option>
                                        <option value="ME">ME</option>
                                        <option value="CE">CE</option>
                                        <option value="BCA">BCA</option>
                                        <option value="BBA">BBA</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-3">
                                    <label>Book Year</label>
                                    <input type="text" name="book_year" value="<?php echo $getBookDetails->book_year;?>" class="form-control" placeholder="Book Year">
                                </div>
                            </div>
                            <input type="hidden" name="book_idd" value="<?php echo base64_encode($getBookDetails->book_id);?>"/>
                            <div class="row">
                                <div class="col-md-3"><br/>
                                    <button type="submit"  name="editBookSingleBtn" class="btn btn-success" formaction="scripts/library/edit-book-script.php"><i class="fa fa-check-circle"></i> Add Book</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->

<?php include('footer.php');?>




