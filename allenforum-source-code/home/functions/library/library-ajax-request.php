<?php
include "../../../config/session_header.php";
include "../../../config/configuration.php";
include_once "../../functions/library/Library.php";
$library = new Library();
/*
 * File Name : library-ajax-request.php
 * Ajax Request  File
 */


if ( isset($_POST['q']) == 'addLibraryBooks' ){

    $book_id = $_POST['book_id'];
    $book_name = $_POST['book_name'];
    $book_author = $_POST['book_author'];
    $book_category = $_POST['book_category'];
    $book_year = $_POST['book_year'];
   // $book_qty = $_POST['book_qty'];
   // $checkBook = $library->getIfBookExist($connection,$book_id);

        $add = $library->addLibraryBooks($connection,$book_id,$book_name,$book_author,$book_category,$book_year);
        if ($add){
            echo 'Book is Added !!';
        } else{
            echo 'fail'.$connection->error;
        }
}
if ( isset($_POST['bookEntryExitForm']) == 'bookEntryExitForm' ) {
    $book_id = $_POST['bookId'];
    $tbody = '';
    $tbody .= '<table class="table">
                <tr style="background-color: #D50000;color: white;">
                    <th>Book ID</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Action</th>
                 </tr>';
    $bookRow =$library->getBookForEntryExit($connection,$book_id);
    if ($bookRow->num_rows > 0) {
        while ($data = $bookRow->fetch_object()) {
            $tbody .= '<tr>';
            $tbody .= '<td>' . $data->book_id . '</td>';
            $tbody .= '<td>' . $data->book_name . '</td>';
            $tbody .= '<td>' . $data->book_author . '</td>';
            $tbody .= "<td>" . (($data->status == 0) ? '<button type="submit" name="bookEntryExitBtn" id="bookEntryExitBtn" onclick="updateBookEntryExit(\'' . $data->book_id . '\',\'in\');" class="btn btn-success btn-flat"  data-toggle="tooltip" title="Accept book"><i class="fa fa-reply"></i> </button>' :
                    '<button type="submit" name="bookEntryExitBtn" id="bookEntryExitBtn" onclick="updateBookEntryExit(\'' . $data->book_id . '\',\'out\');" class="btn btn-primary btn-flat" data-toggle="tooltip" title="Issue book"><i class="fa  fa-share"></i> </button>') . "</td>";
            $tbody .= '</tr>';
        }
    }
        $tbody .= '</table>';

    echo $tbody;

}
if (isset($_POST['updateBookEntry']) == 'updateBookEntry'){
    $mesg = '';
    $bookId = $_POST['bookId'];
    $type = $_POST['type'];
    $library = new Library();
    $data = $library->updateBookEntryExit($connection,$bookId,$type);
    if ($data){
        echo "Book Status Updated !";
    }
}

/*
 * search book by keyword
 */

if (isset($_POST['bookSearchByKeyWord']) == 'bookSearchByKeyWord'){
    $searchBookKeyword = $_POST['searchBookKeyword'];
    $getBooks = $library->searchBookByKeywords($connection,$searchBookKeyword);
    $bookdata = '';
    if ($getBooks->num_rows > 0){
        while ($books = $getBooks->fetch_object()){
        $bookdata .= '<div class="box-footer box-comments" style="background-color: white">
                        <div class="box-comment">
                            <img class=" img-sm" src="ownImages/other/open-book.png" alt="User Image">
                            <div class="comment-text">
                              <span class="username">
                                <a href="searched-book-detail.php?bookId='.base64_encode($books->book_id).'&book='.base64_encode($books->book_name).' " target="_blank">'.$books->book_name.'</a>
                              </span>
                               '.$books->book_category.'
                            </div>
                        </div>
                    </div>';
        }
    } else{
        $bookdata .= '<span class="badge">No Book Matched with this keyword !</span>';
    }
    echo $bookdata;
}

/*
 * upload Library Booksheet
 */

if (isset($_POST['uploadSheet']) == "bookSheetUpload"){
    if($_FILES['book_sheet']['name'])   {
        $arrFileName = explode('.',$_FILES['book_sheet']['name']);
        if($arrFileName[1] == 'csv')     {
            $handle = fopen($_FILES['book_sheet']['tmp_name'], "r");
            // $count = 0;

            while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {
                //$count++;
                //  if ($count == 1) { continue; }
                $bookId = $data[0];
                $bookName = $connection->real_escape_string($data[1]);
                $bookAuthor = $connection->real_escape_string($data[2]);
                $bookCategory = $data[3];
                $bookYear = $data[4];

                $bookUpload = $library->uploadLibraryBooks($connection,$bookId,$bookName,$bookAuthor,$bookCategory,$bookYear);

            }
            if ($bookUpload){
               echo "test^uploaded";
            }
        }
    }
    if ($_FILES['book_sheet']['tmp_name']){
        $uploadfileName = $_FILES['book_sheet']['name'];
        $uploadfileTmpName = $_FILES['book_sheet']['tmp_name'];
        $uploadDir = "../../uploads/sheets/";
        $target_file = $uploadDir.$uploadfileName;
        move_uploaded_file($uploadfileTmpName,$target_file) or die("Error in uploading".$connection->error);
    }
}

/*
 * get Librarian Books data on dashboards
 */

if (isset($_POST['getLibrarianDahboard']) == "getLibrarianBooksByType"){
    $bookType = $_POST['bookType'];
    $libraryBooks = $library->getLibraryBookByCategory($connection,$bookType);
    //print_r($libraryBooks);
    echo 'test^'.
        $libraryBooks['specified'].'^'.
        $libraryBooks['csBooks'].'^'.
        $libraryBooks['meBooks'].'^'.
        $libraryBooks['ecBooks'].'^'.
        $libraryBooks['managementBooks'].'^'.
        $libraryBooks['defaultBooks'].'^'.
        $libraryBooks['applied'].'^'.
        $libraryBooks['totalBooks'] ;
}

