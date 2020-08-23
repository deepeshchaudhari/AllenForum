<?php include "../config/session_header.php"; ?>
<?php include "functions/library/Library.php";?>
<?php
$pageTitle = "View Book Detail | Allenhouse Group of Colleges";
include('header.php');
?>
<?php
$activeTabDash = "active";
$activeLinkDash = "active";
include('sidebar.php');
?>
<?php
if (isset($_GET['bookId']) && isset($_GET['book'])){
    $bookId = base64_decode($_GET['bookId']);
    $bookName = base64_decode($_GET['book']);
    $library = new Library();
    $book = $library->getLibraryBookDetailsById($connection,$bookId,$bookName);
    if ($book->num_rows > 0) {
        $bookDetail = $book->fetch_object();
        $bookName = $bookDetail->book_name;
        $bookAuthor = $bookDetail->book_author;
        $bookCategory = $bookDetail->book_category;
        $book_year = $bookDetail->book_year;
        $bookQty = $book->num_rows;
    } else{
        header("Location:404.php");
    }
} else{
    header("Location:404.php");

}
?>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-widget widget-user">
                    <div class="box-header">
                        <a href="search-library-books.php" data-toggle="tooltip" data-original-title="Back">
                            <img src="ownImages/other/left-arrow.png">
                        </a>
                        <h3 class="box-title pull-right">Book Detail<i class="fa fa-fire"></i></h3>
                    </div>
                    <div class="box-footer">
                        <div class="post">
                            <div class="book-detail-view">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="box box-widget widget-user-2">
                                        <div class="widget-user-header bg-info">
                                            <img src="ownImages/other/open-book%20-larger-1.png" class="pull-right">
                                            <h4 style="margin-left: 2px;"><?php echo $bookName;?></h4>
                                        </div>
                                        <div class="box-footer no-padding">
                                            <ul class="nav nav-stacked">
                                                <li><a href="#">Author <span class="pull-right badge bg-blue"><?php echo $bookAuthor;?></span></a></li>
                                                <li><a href="#">Category <span class="pull-right badge bg-aqua"><?php echo $bookCategory;?></span></a></li>
                                                <li><a href="#">Quantity<span class="pull-right badge bg-green"><?php echo $bookQty;?></span></a></li>
                                                <li><a href="#">Year<span class="pull-right badge bg-green"><?php echo $book_year;?></span></a></li>
                                                <li><a href="#">Total Pages <span class="pull-right badge bg-red">N/A</span></a></li>
                                            </ul>
                                        </div>
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
<script type="text/javascript">


    window.onload = function() {
        getSingleDiscussionMessages();
    };
</script>

