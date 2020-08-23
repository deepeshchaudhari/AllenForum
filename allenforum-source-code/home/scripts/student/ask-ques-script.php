<?php
include "../../../config/session_header.php";
include "../../../config/configuration.php";
if (isset($_POST['askQuestionBtn'])){

    $toWhome        = $_POST['askWithWhome'];
    $dept           = $_POST['shareWithdepartment'];
    $year           = $_POST['shareWithYear'];
    $questionTitle  = $_POST['question_title'];
    $yourQuestion   = $connection->real_escape_string($_POST['your_question']);

    $problemsPic    = $_FILES['problem_pics']['name'];
    $problemsPicTmp = $_FILES['problem_pics']['tmp_name'];

    if (empty($problemsPicTmp)){
        $problemsMedia = "";

        $addQuestionQuery = "INSERT INTO forum_questions
            (title,question,screen_shot,to_whome,year,department,asked_by,q_date_time) 
             VALUES ('".$questionTitle."','".$yourQuestion."','".$problemsMedia."','".$toWhome."','".$year."',
             '".$dept."','".$_SESSION['userId']."',now()) " ;
    } else{

        $problemsMedia = "uploads/problems/".$problemsPic;
        move_uploaded_file($problemsPicTmp,"../../".$problemsMedia) or
        die("problem pic can not move to destination");

        $addQuestionQuery = "INSERT INTO forum_questions
            (title,question,screen_shot,to_whome,year,department,asked_by,q_date_time) 
             VALUES ('".$questionTitle."','".$yourQuestion."','".$problemsMedia."','".$toWhome."','".$year."',
             '".$dept."','".$_SESSION['userId']."',now()) " ;

    }

    // we will also send the id of the student, to find who is asking the question
    // we also need to add the time that which student has aksed the question when ?

    $addQuestion = $connection->query($addQuestionQuery)
    or  die("question could not added".$connection->error);


   $postUrl = "Location:../../forum-dicussion.php?myactivity=active&status=Question successfully posted";
    if ($addQuestion){
        //  echo "<script>alert('Your Question is added !');</script>";
        header($postUrl);
    }


}
?>