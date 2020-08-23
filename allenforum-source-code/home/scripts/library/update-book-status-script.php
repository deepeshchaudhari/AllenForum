<?php

include "../../../config/config.php";
if (isset($_POST['updateBookStatusBtn'])) {

	$bookId     = $_POST['book_id'];
	$updatedQty = $_POST['updatedQty'];

   $queryUpdate = mysql_query(" UPDATE forum_library SET book_quantity = '$updatedQty' 
    	where book_id = '$bookId'  ")  or die("status could not updated".mysql_error());

    header('Location:../../update-book-status.php?action=book_status&status=success');

   

}

?>