<?php
include "../../../../config/session_header.php";
include "../../../../config/configuration.php";

if (isset($_POST['editNotesBtn'])){
    $notes_Id            = base64_decode($_POST['notesId']);
    $notes_category      = $_POST['notes_category'];
    $notes_title         = $_POST['notes_title'];
    $notes_file_name     = $_FILES['notes_file']['name'];
    $notes_tmp           = $_FILES['notes_file']['tmp_name'];

    if (empty($notes_tmp)){
        /* update new values */
        $connection->query("UPDATE forum_notes_upload SET   
         notes_title    = '" . $notes_title . "',
         notes_category = '" . $notes_category . "',
         uploaded_by    = '" . $_SESSION['userId'] . "',
         uploaded_on    = now()
         WHERE id = '" . $notes_Id . "' 
         ")
        or die("Error in notes updation:" . $connection->error);
    } else {

        $notes_file_ext = pathinfo($notes_file_name, PATHINFO_EXTENSION);
        $defined_types = array('pdf', 'docx', 'png', 'jpg', 'jpeg');
        if (!in_array($notes_file_ext, $defined_types)) {
            $_SESSION['updateNotesStatus'] = "Failed !,Only pdf,docx,png,jpg,jpeg are supported ! ";
        } else {
            /* replace the previous file */
            $prevFile = $connection->query("SELECT * FROM forum_notes_upload
         WHERE id = '$notes_Id' ")->fetch_object();
            // or die("Error in previous file".$connection->error);
            unlink('../../../' . $prevFile->notes_file);

            $directory = "uploads/notes/" . $notes_file_name;
            $moveNotes = move_uploaded_file($notes_tmp, '../../../' . $directory);
            if (!$moveNotes) {
                die("Error in File Upload is :" . $_FILES['notes_file']['error']);
            }
            /* update new values */
            $connection->query("UPDATE forum_notes_upload SET   
         notes_title    = '" . $notes_title . "',
         notes_category = '" . $notes_category . "',
         notes_file     = '" . $directory . "',
         uploaded_by    = '" . $_SESSION['loginId'] . "',
         uploaded_on    = now()
         WHERE id = '" . $notes_Id . "' 
         ")
            or die("Error in notes updation:" . $connection->error);

            $_SESSION['updateNotesStatus'] = 'Notes Updated Successfully !';
        }
    }
    header("Location:../../../upload-notes.php?status=".$_SESSION['updateNotesStatus']);
}