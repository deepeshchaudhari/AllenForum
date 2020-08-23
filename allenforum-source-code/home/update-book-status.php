<?php include "../config/session_header.php"; ?>
<?php
$pageTitle = "Questions Asked  | Allenhouse Group of Colleges";
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
                            <h3 class="box-title">Total Library Books
                                <a href="add-books.php"><i class="fa fa-plus-circle"></i></a>
                            </h3>
                            <!-- tools box -->
                            <div class="pull-right box-tools">
                                   <span>
                                       <img src="ownImages/other/gif_processing.gif" width="30" height="30">
                                   </span>
                            </div>
                        </div> <hr/>

                        <!--<div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                    <input type="text" id="savedAnsKeyWord" class="form-control" placeholder="Start Typing Something...">
                                </div><br/>
                            </div>
                        </div>-->

                        <div class="table-responsive ">
                            <table  id="example1" class="table table-hover table-striped">
                                <thead>
                                <tr style="color: white; background-color: #00BFA5;">
                                    <th>Sr.</th>
                                    <th>Book Name</th>
                                    <th>Book Author</th>
                                    <th>Category</th>
                                    <th>Quantity</th>
                                    <th>Year</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                $libraryBooks = $connection->query("SELECT * FROM  forum_library_books ORDER BY id DESC ");

                                // $quesDetails = $connection->query("SELECT * FROM  forum_question WHERE  q_id = '$savedAnswer' ");
                                $sr = 1;
                                while ($myLibraryBooks = $libraryBooks->fetch_object() ){ ?>
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
                                        <td><a href="#">
                                                <i class="glyphicon glyphicon-remove-circle" style="color: red"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $sr++; } ?>
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
                                    <th>Delete</th>
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




