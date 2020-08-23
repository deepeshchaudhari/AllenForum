<?php
include "../../../config/session_header.php";
include "../../../config/configuration.php";

if (isset($_GET['id']))
{
    $book_id = base64_decode($_GET['id']);

    $getBook = $connection->query("SELECT * FROM forum_library WHERE book_id = '$book_id' ")
    or die("Errorn in book finding:".$connection->error);

    if ($getBook->num_rows > 0 ){
        $deleteBook = $connection->query("DELETE FROM forum_library WHERE book_id = '$book_id' ")
        or die("Errro in book deletetion".$connection->error);
        if ($deleteBook){
            $_SESSION['bookDeleteStatus'] = 'You Deleted a Book !';
            header('Location:../../view-and-delete-library-books.php');

        }
    } else{
        die("Errrorn: Book Not found".$connection->error);
    }
}



?>