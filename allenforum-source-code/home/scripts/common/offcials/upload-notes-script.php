<?php
include "../../../../config/session_header.php";
include "../../../../config/configuration.php";

if (isset($_POST['uploadNotesBtn'])){

    $notes_category      = $_POST['notes_category'];
    $notes_title         = $_POST['notes_title'];
    $notes_file_name     = $_FILES['notes_file']['name'];
    $notes_tmp           = $_FILES['notes_file']['tmp_name'];

    $notes_file_ext = pathinfo($notes_file_name,PATHINFO_EXTENSION);
    $defined_types = array('pdf','docx','png','jpg','jpeg');
    if (! in_array($notes_file_ext,$defined_types)){
       $_SESSION['uploadNotesStatus'] = "Only pdf,docx,png,jpg,jpeg are supported ! ";
    }
    else {
        $directory = "uploads/notes/".$notes_file_name;
        $moveNotes = move_uploaded_file($notes_tmp,'../../../'.$directory);
        if ( ! $moveNotes){
            die("Error in File Upload is :".$_FILES['notes_file']['error']);
        }
        $uploadNotes = $connection->query("  INSERT INTO  forum_notes_upload
         (notes_title,notes_category,notes_file,uploaded_by,uploaded_on)
          VALUES ('".$notes_title."','".$notes_category."','".$directory."','".$_SESSION['loginId']."',now()) 
         ") or die("Error in notes upload:".$connection->error);
        $_SESSION['uploadNotesStatus']  = 'Notes Uploaded Successfully !';
    }
    header("Location:../../../upload-notes.php?status=".$_SESSION['uploadNotesStatus']);
}