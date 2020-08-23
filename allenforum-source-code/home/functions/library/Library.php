<?php
/**
 * Created by Ankit.
 * User: acer
 * Date: 2/15/2018
 * Time: 12:20 AM
 */
/*
 * File Name : Library.php
 * Class File
 */
class Library {
    function getNewBookSrNo($connection){
        $bookSrNumber = 0;

        $queryResult = $connection->query("SELECT MAX(book_id) AS newBookId FROM forum_bookss");
        return $queryResult;
    }
    function getIfBookExist($connection,$book_id){
        $query = $connection->query("SELECT * FROM forum_library WHERE book_id='$book_id' ");
        if ($query->num_rows > 0){
            return true;
        } else{
            return false;
        }

    }
    function addLibraryBooks($connection,$book_id,$book_name,$book_author,$book_category,$book_year,$book_qty){

       /* $authorChar = substr($book_author,'0','4');
        $bookChar = substr($book_name,'0','4');
        $book_typeId= strtolower($authorChar.'-'.$bookChar);*/

       /* $i = 0;
        while ($i < $book_qty) {
           // $insertedRows =
            $bookId = $book_id+$i;
            $query2 = "INSERT INTO forum_library_books SET book_id = '$bookId',booktype_id='$book_typeId' ";
            $result2 = $connection->query($query2);
            $i++;
        }*/

        $query1 = "INSERT INTO  forum_bookss SET book_id = '$book_id',
            book_name = '$book_name', book_author='$book_author',book_category='$book_category',book_year='$book_year' ";

        $result = $connection->query($query1);
        return $result;
    }

    function getLibraryBookByCategory($connection,$category){
        $books = array();
        if ($category) {
            $querySpecific = "SELECT COUNT(*) as specificBookCount FROM `forum_bookss` WHERE `book_category` LIKE '%$category%'";
            $specificBookCount = $connection->query($querySpecific)->fetch_object()->specificBookCount;

        }  if (! $category){
            $querycs = "SELECT COUNT(*) as csbookCount FROM `forum_bookss` WHERE `book_category` LIKE '%Computer Science%'";
            $csBookCountResult = $connection->query($querycs);
            if ($csBookCountResult->num_rows > 0){
                $csBookCount = $csBookCountResult->fetch_object()->csbookCount;
            } else{
                $csBookCount=0;
            }

            $queryec = "SELECT COUNT(*) as ecbookCount FROM `forum_bookss` WHERE `book_category` LIKE '%Electronics Communication%'";
            $queryecResult = $connection->query($queryec);
            if ($queryecResult->num_rows > 0){
                $ecBookCount = $queryecResult->fetch_object()->ecbookCount;
            } else{
                $ecBookCount=0;
            }

            $queryManagement = "SELECT COUNT(*) as managementbookCount FROM `forum_bookss` WHERE `book_category` LIKE '%Management%'";
            $queryManagementResult = $connection->query($queryManagement);
            if ($queryManagementResult->num_rows > 0){
                $managementBookCount = $queryManagementResult->fetch_object()->managementbookCount;
            } else{
                $managementBookCount=0;
            }

            $meBookCountResult = $connection->query("SELECT COUNT(*) as mebookCount FROM `forum_bookss` WHERE `book_category` LIKE '%Mechanical Engineering%'");
            if ($meBookCountResult->num_rows > 0){
                $meBookCount = $meBookCountResult->fetch_object()->mebookCount;

            }

            $querydefault = "SELECT COUNT(*) as defaultbookCount FROM `forum_bookss` WHERE `book_category` LIKE '%Default Category%'";
            $querydefaultResult = $connection->query($querydefault);
            if ($querydefaultResult->num_rows > 0) {
                $defaultBookCount = $querydefaultResult->fetch_object()->defaultbookCount;
            }  else{
                $defaultBookCount=0;
            }

            $queryApplied = "SELECT COUNT(*) as appliedScibookCount FROM `forum_bookss` WHERE `book_category` LIKE '%Applied Science & Humanities%'";
            $queryAppliedResult = $connection->query($queryApplied);
            if ($queryAppliedResult->num_rows > 0){
                $appliedScibookCount = $queryAppliedResult->fetch_object()->appliedScibookCount;
            } else{
                $appliedScibookCount=0;
            }

            $totalBooks = $connection->query("SELECT COUNT(*) AS totalBooks FROM forum_bookss") or die("error in total books".$connection->error);
            if ($totalBooks->num_rows > 0) {
                $totalBooksCount = $totalBooks->fetch_object()->totalBooks;
            } else{
                $totalBooksCount=0;
            }



        }
        if (@$specificBookCount){
            $specificBookCount = $specificBookCount;
        } else{
            $specificBookCount = "0";
        }
        $books['specified'] = @$specificBookCount;
        $books['csBooks'] = @$csBookCount;
        $books['meBooks'] = @$meBookCount;
        $books['ecBooks'] = @$ecBookCount;
        $books['managementBooks'] = @$managementBookCount;
        $books['defaultBooks'] = @$defaultBookCount;
        $books['applied'] = @$appliedScibookCount;
        $books['totalBooks'] = @$totalBooksCount;

        if ($books){
            return $books;
        }
    }

    function getBookForEntryExit($connection,$book_id){
        $query = "SELECT * FROM  forum_bookss WHERE book_id = '$book_id' ";
        $book = $connection->query($query);
        return $book;
    }
//    function updateBookQuantityOnEntryExit($connection,$bookTypeId,$bookQty,$type){
//        /* taking book entry cant be > exsting */
//        $bookquantity = $connection->query("SELECT * FROM forum_library_books WHERE
//            booktype_id = '$bookTypeId' ")->num_rows;
//
//        if ($type == 'entry'){
//            $newQty = $bookQty + 1;
//            if ($newQty > $bookquantity){
//                echo "Books Can not be accepted !!"; die();
//            }
//
//        } else if ($type == 'return'){
//            $newQty = $bookQty - 1;
//            if ($newQty<0){
//                echo "Books Can't be less than  0 "; die();
//            }
//        }
//        $update = $connection->query("UPDATE forum_library SET quantity='$newQty' WHERE booktype_id = '$bookTypeId' ");
//        if ($update){
//            return true;
//        }else{
//            return "Error:".$connection->error;
//        }
//
//    }

    function updateBookEntryExit($connection,$bookId,$type){
        if ($type == "in"){
            $status = 1;
        } else if ($type == "out"){
            $status = 0;
        }
        $checkBookExist = $connection->query("SELECT * FROM  forum_bookss WHERE book_id='$bookId' ");
        if ($checkBookExist->num_rows > 0){
            $updateBookEntry = $connection->query("UPDATE forum_bookss SET status='$status' WHERE book_id='$bookId' ");
        }
        return $updateBookEntry;
    }

    /*
     * Upload Library Books
     */
    function uploadLibraryBooks($connection,$bookId,$bookName,$bookAuthor,$bookCategory,$bookYear){
        $query = "INSERT INTO  forum_bookss SET book_id = '$bookId', book_name='$bookName',book_author='$bookAuthor',book_category='$bookCategory',book_year='$bookYear'";
        $result = $connection->query($query);
        return $result;
    }

    /*
     * search book by keyword
     */

    function searchBookByKeywords($connection,$keyword){
        $query = "SELECT book_id, book_name,book_author,book_category,book_year,COUNT(book_id) AS book_qty FROM `forum_bookss` ";
        if ($keyword){
            $query .= " WHERE book_category  LIKE '%{$keyword}%' OR  book_author LIKE '%{$keyword}%' OR  book_id LIKE '%{$keyword}%' OR  book_name LIKE '%{$keyword}%' ";
        }
        $query .= "GROUP BY book_name";
        //echo $query; die();
        $resullt = $connection->query($query);
        return $resullt;
    }

    function getLibraryBookDetailsById($connection,$bookId,$bookName){
//        $query = "SELECT * FROM forum_bookss  WHERE book_id = '$bookId' ";
        $query = "SELECT * FROM forum_bookss  WHERE book_name = '$bookName' AND status=1";
        $result = $connection->query($query);
        return $result;
    }

}