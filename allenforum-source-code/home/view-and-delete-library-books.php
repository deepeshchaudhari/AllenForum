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

                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-group">
                                    <span class="input-group-addon"><i class="fa fa-search"></i></span>
                                    <input type="text" id="savedAnsKeyWord" class="form-control" placeholder="Start Typing Something...">
                                </div><br/>
                            </div>
                        </div>
                        <?php if (isset($_SESSION['bookDeleteStatus'])){ ?>
                        <div class="row">
                            <div class="col-lg-12">
                               <div class="text-center">
                                   <span class="badge" style="background-color: red"><?php echo $_SESSION['bookDeleteStatus'];?></span>
                               </div>
                            </div>
                        </div><br/>
                        <?php } unset($_SESSION['bookDeleteStatus']); ?>

                        <div class="table-responsive ">
                            <table class="table table-hover table-striped">
                                <thead>
                                <tr style="color: white; background-color: #00BFA5;">
                                    <th style="border: 1px solid black">Sr.</th>
                                    <th style="border: 1px solid black">Book Id</th>
                                    <th style="border: 1px solid black">Book Name</th>
                                    <th style="border: 1px solid black">Book Author</th>
                                    <th style="border: 1px solid black">Category</th>
                                    <th style="border: 1px solid black">Year</th>
                                    <th style="border: 1px solid black">Edit</th>
                                    <th style="border: 1px solid black">Delete</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php

                                $libraryBooks = $connection->query("SELECT * FROM forum_library ORDER BY id DESC ");

                                // $quesDetails = $connection->query("SELECT * FROM  forum_question WHERE  q_id = '$savedAnswer' ");
                                $sr = 1;
                                while ($myLibraryBooks = $libraryBooks->fetch_object() ){ ?>
                                    <tr>
                                        <td style="border: 1px solid black"><?php echo $sr;?></td>
                                        <td style="border: 1px solid black"><?php echo $myLibraryBooks->book_id;?> </td>
                                        <td style="border: 1px solid black"><?php echo $myLibraryBooks->book_name;?> </td>
                                        <td style="border: 1px solid black"><?php echo $myLibraryBooks->book_author;?> </td>
                                        <td style="border: 1px solid black"><?php echo $myLibraryBooks->book_category;?> </td>
                                        <td style="border: 1px solid black"><?php echo $myLibraryBooks->book_year;?> </td>
                                        <td style="border: 1px solid black"><a href="edit-book-details.php?edit=<?php echo base64_encode($myLibraryBooks->book_id) ;?>">
                                             <i class="glyphicon glyphicon-pencil" style="color: #E91E63"></i>
                                            </a>
                                        </td>
                                        <td style="border: 1px solid black"><a href="scripts/library/delete-book-script.php?id=<?php echo base64_encode($myLibraryBooks->book_id);?>">
                                                <i class="glyphicon glyphicon-remove-circle" style="color: red"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    <?php $sr++; } ?>
                                </tbody>
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




