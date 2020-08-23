<?php include "../config/session_header.php"; ?>
<?php
$pageTitle = "View Library Books  | Allenhouse Group of Colleges";
include('header.php');

$activeTabDash = "";
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
                            <h3 class="box-title">Total Library Books
                               <?php if ($_SESSION['userrole'] == 'librarian'){
                                   echo ' <a href="add-books.php"><i class="fa fa-plus-circle"></i></a>';
                               }?>
                            </h3>
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                               <span>
                                   <img src="ownImages/other/gif_processing.gif" width="30" height="30">
                               </span>
                            </div>
                        </div> <hr/>
                        <div class="table-responsive ">
                            <table  id="libraryBooks" class="table table-hover table-striped">
                                <thead>
                                <tr style="color: white; background-color: #00BFA5;">
                                    <th>Sr.</th>
                                    <th>Book Name</th>
                                    <th>Book Author</th>
                                    <th>Category</th>
                                    <th>Quantity</th>
                                    <th>Year</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $libraryBooks = $connection->query("SELECT book_id,COUNT(book_id) AS total_books,book_name,book_author,book_category,book_year,status FROM forum_bookss WHERE status=1 GROUP BY book_name");
                                $sr = 1;
                                if($libraryBooks->num_rows>0){
                                while ($myLibraryBooks = $libraryBooks->fetch_object() ){ ?>
                                    <tr>
                                        <td><?php echo $sr;?></td>
                                        <td><?php echo $myLibraryBooks->book_name;?> </td>
                                        <td><?php echo $myLibraryBooks->book_author;?> </td>
                                        <td><?php echo $myLibraryBooks->book_category;?> </td>
                                        <td><?php echo $myLibraryBooks->total_books;?></td>
                                        <td><?php echo $myLibraryBooks->book_year;?> </td>
                                    </tr>
                                    <?php $sr++; }} ?>
                                </tbody>
                                <tfoot>
                                <tr style="color: white; background-color: #00BFA5;">
                                    <th>Sr.</th>
                                    <th>Book Name</th>
                                    <th>Book Author</th>
                                    <th>Category</th>
                                    <th>Quantity</th>
                                    <th>Year</th>
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




