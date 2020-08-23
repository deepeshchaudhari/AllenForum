<?php
include "../../../config/session_header.php";
include "../../../config/configuration.php";

if (isset($_POST['editBookSingleBtn'])){
    $bookId =  base64_decode($_POST['book_idd']);

    $book_name = $_POST['book_name'];
    $book_category = $_POST['book_category'];
    $book_author = $_POST['book_author'];
    $book_year = $_POST['book_year'];

    $updateDetails = $connection->query("UPDATE forum_library SET
         book_name = '$book_name',
         book_author = '$book_author',
         book_year   = '$book_year',
         book_category = '$book_category'
         WHERE book_id = '$bookId'
     ")
    or die('error in upddate'.$connection->error);
    if ($updateDetails){
        $_SESSION['book_update_status'] = 'Book Detail Updated Successfully !';
    }
    header("Location:../../view-and-delete-library-books.php?action=view");



}
