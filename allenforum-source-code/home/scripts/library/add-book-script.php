<?php
include "../../../config/session_header.php";
include "../../../config/configuration.php";

if (isset($_POST['addBookSingleBtn'])){
    $addBook = $connection->query("insert into forum_library 
        (book_id,book_name,book_author,book_category,book_year)
          VALUES ('".$_POST['book_id']."',
                 '".$_POST['book_name']."',
                 '".$_POST['book_author']."',
                 '".$_POST['book_category']."',
                 '".$_POST['book_year']."') ")
    or die("book not added".$connection->error);

    if (!$addBook){
        die("Book add failed".$connection->error);
    }
    else{
        header('Location:../../view-and-delete-library-books.php');
    }
}

/*----------------------------------------------
 this  script add the book with CSV sheet to database
-----------------------------------------------*/

if (isset($_POST['addBookWithCSVBtn'])){
    $file        = $_FILES['bookSheet']['name'];
    $fileTmpName = $_FILES['bookSheet']['tmp_name'];

    $fileExtension = pathinfo($file,PATHINFO_EXTENSION);
    $allowedType = array('csv');
    if (!in_array($fileExtension,$allowedType)){
       $_SESSION['bookSheetUploadError'] = 'Invalid File,Choose Correct File';
        header('Location:../../add-books.php');
    } else {

        $handle = fopen($fileTmpName, 'r');
        while (($data = fgetcsv($handle, 1000, ',')) != false) {
           // $numRow = $connection->query("select * from forum_library")->num_rows;

            $bookID          = $data[0];
            $book_name       = $data[1];
            $book_author     = $data[2];
            $book_category   = $data[3];
            $book_year        = $data[4];

            $queryAddBookSheet = $connection->query("INSERT INTO forum_library 
            (book_id,book_name,book_author,book_category,book_year) 
            VALUES ('".$bookID."','".$book_name."','".$book_author."','".$book_category."','".$book_year."')  ");

        }
        header('Location:../../view-and-delete-library-books.php');

    }
}


