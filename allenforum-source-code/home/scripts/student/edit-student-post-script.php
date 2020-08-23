<?php
include "../../../config/session_header.php";
include "../../../config/configuration.php";

    if (isset($_POST['editQuestionBtn'])){

        $postId         = $_POST['postId'];

        $toWhome        = $_POST['askWithWhome'];
        $dept           = $_POST['shareWithdepartment'];
        $year           = $_POST['shareWithYear'];
        $questionTitle  = $_POST['question_title'];
        $yourQuestion   = $connection->real_escape_string($_POST['your_question']);
       // echo $questionTitle; exit;


        $problemsPic    = $_FILES['problem_pics']['name'];
        $problemsPicTmp = $_FILES['problem_pics']['tmp_name'];

        if (empty($problemsPicTmp)){
            $problemsMedia = "";

            $updateQuesQuery = "UPDATE forum_questions SET

            title       ='$questionTitle',
            question    ='$yourQuestion',
            screen_shot ='$problemsMedia',
            to_whome    ='$toWhome',
            year        ='$year',
            department  ='$dept',
            q_date_time = now() 
            WHERE q_id='$postId' AND asked_by ='".$_SESSION['userId']."'
             " ;

        } else{

            $problemsMedia = "uploads/problems/".$problemsPic;
            move_uploaded_file($problemsPicTmp,"../../".$problemsMedia) or
            die("problem pic can not move to destination");

            $updateQuesQuery = "UPDATE forum_questions SET

            title       ='$questionTitle',
            question    ='$yourQuestion',
            screen_shot ='$problemsMedia',
            to_whome    ='$toWhome',
            year        ='$year',
            department  ='$dept',
            q_date_time = now() 
            WHERE q_id='$postId' AND asked_by ='".$_SESSION['userId']."'
             " ;

        }

        // we will also send the id of the student, to find who is asking the question
        // we also need to add the time that which student has aksed the question when ?

        $updateQResult = $connection->query($updateQuesQuery)
        or  die("question could not added".$connection->error);


        if ( ! $updateQResult){
            echo "Something error".$connection->error;
        } else{
            header("Location:../../forum-dicussion.php?home=active&status=Question successfully posted");

        }


    }
    ?>
