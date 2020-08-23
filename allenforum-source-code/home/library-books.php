<?php include "../config/session_header.php"; ?>
<?php
$pageTitle = "Library Books  | Allenhouse Group of Colleges";
include('header.php');
include_once "functions/library/Library.php";
?>

<?php  $activeTabDash = "";
$activeLinkDash = "";

?>
<?php

if (isset($_GET['category']) && $_GET['category'] != ''){
    $category = $_GET['category'];
    $library = new Library();
    $books = $library->getLibraryBookByCategory($connection,$category);

} else{
    header("Location:404.php");
}
?>
<?php include('sidebar.php');?>
<div class="content-wrapper">
    <section class="content">
        <div  class="row">
            <div class="col-md-12">
                <div class="nav-tabs-custom">
                    <div class="tab-content">
                        <div class="box-header">
                           <a href="dashboard.php?action=homepage&title=dashboard"> <i class="glyphicon glyphicon-arrow-left"></i></a>
                            <h3 class="box-title">Library Books</h3>
                            <div class="pull-right box-tools">
                                   <span>
                                       <img src="ownImages/other/gif_processing.gif" width="30" height="30">
                                   </span>
                            </div>
                        </div> <hr/>
                        <div class="table-responsive ">
                            <table  id="libraryBookByCategory" class="table table-hover table-striped">
                                <thead>
                                <tr style="color: white; background-color: #00BFA5;">
                                    <th>Sr.</th>
                                    <th>Book Name</th>
                                    <th>Book Author</th>
                                    <th>Category</th>
                                    <th>Quantity</th>
                                    <th>Year</th>
                                    <th>Edit</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                if ($books->num_rows > 0 ){
                                $sr = 1;
                                while ($myLibraryBooks = $books->fetch_object() ){ ?>
                                    <tr>
                                        <td><?php echo $sr;?></td>
                                        <td><?php echo $myLibraryBooks->book_name;?> </td>
                                        <td><?php echo $myLibraryBooks->book_author;?> </td>
                                        <td><?php echo $myLibraryBooks->book_category;?> </td>
                                        <td><?php echo $myLibraryBooks->quantity;?></td>
                                        <td><?php echo $myLibraryBooks->book_year;?> </td>
                                        <td><a href="#">
                                                <i class="glyphicon glyphicon-pencil" style="color: #E91E63"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $sr++;
                                     }
                                } ?>
                                </tbody>
                                <tfoot>
                                <tr style="color: white; background-color: #00BFA5;">
                                    <th>Sr.</th>
                                    <th>Book Name</th>
                                    <th>Book Author</th>
                                    <th>Category</th>
                                    <th>Quantity</th>
                                    <th>Year</th>
                                    <th>Edit</th>
                                </tr>
                                </tfoot>
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




