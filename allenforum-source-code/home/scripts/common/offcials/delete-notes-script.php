<?php
include "../../../../config/session_header.php";
include "../../../../config/configuration.php";

if (isset($_GET['id'])){
    $notesId = base64_decode($_GET['id']);

    $select = $connection->query("SELECT * FROM  forum_notes_upload WHERE id = '$notesId' ")
    or die("Notes not Found".$connection->error);

    /* delete the notes pdf too */
    $notes = $select->fetch_object()->notes_file;
    unlink('../../../'.$notes);

    if ($select->num_rows > 0){
        $deleteNotes  = $connection->query("DELETE FROM forum_notes_upload 
        WHERE id = '$notesId' ") or die("Error in delete".$connection->error);

        $_SESSION['deleteNotesStatus'] = "Notes Deleted Successfuly !";
    } else{
        echo die("Something error occurred".$connection->error);
    }
    header("Location:../../../upload-notes.php?status=".$_SESSION['deleteNotesStatus']);
}