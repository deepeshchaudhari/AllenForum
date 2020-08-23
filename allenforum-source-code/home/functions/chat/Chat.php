<?php
/*
 * File Name : Chat.php
 * Class File
 */
class Chat
{
    function getChatingPersonDetail($connection,$userId,$role){
        if ($role == "student"){
            $query = "SELECT fs.student_name as person_name,fs.student_profile as person_profile FROM forum_student fs WHERE fs.user_id = '$userId' ";
        } else if ($role == "faculty"){
            $query = "SELECT ff.name as person_name,ff.profile as person_profile FROM forum_faculty ff WHERE  ff.user_id = '$userId' ";
        }
        $result = $connection->query($query);
        return $result;
    }

    function sendChatMessage($connection,$userId,$textMessage,$chatWith,$chatWithRole){
        $chatTime = date('Y-m-d H:i:s');
        $chat = " INSERT INTO forum_chat SET send_by='$userId',message = '$textMessage',send_to='$chatWith',user_type='$chatWithRole',chat_time='$chatTime' ";
        $result = $connection->query($chat);
        return $result;
    }

    function getForumChatMessages($connection,$sendBy,$sendTo,$chatWithRole){
       /* $chatMessages = "SELECT fc.*,fu.name,fu.profile_pic AS chat_profile FROM forum_chat fc
LEFT JOIN forum_users fu ON fc.send_by=fu.user_id WHERE (fc.send_by='$sendBy' AND fc.send_to='$sendTo') OR
(fc.send_by='$sendTo' AND fc.send_to='$sendBy') GROUP BY fc.id ORDER BY fc.chat_time ";*/
       if ($chatWithRole == 'student'){
           $chatMessages = "SELECT fc.*,fs.student_name as person_name,fs.student_profile AS person_profile FROM forum_chat fc LEFT JOIN forum_student fs
 ON fc.send_by=fs.user_id WHERE (fc.send_by='$sendBy' AND fc.send_to='$sendTo') OR (fc.send_by='$sendTo' AND fc.send_to='$sendBy') 
 GROUP BY fc.id ORDER BY fc.chat_time";
       }
       else if ($chatWithRole == 'faculty'){
           $chatMessages = "SELECT fc.*,ff.name as person_name,ff.profile AS person_profile FROM forum_chat fc LEFT JOIN forum_faculty ff
 ON fc.send_by=ff.user_id WHERE (fc.send_by='$sendBy' AND fc.send_to='$sendTo') OR (fc.send_by='$sendTo' AND fc.send_to='$sendBy') 
 GROUP BY fc.id ORDER BY fc.chat_time";
       }
       // echo  $chatMessages; die();
        $result = $connection->query($chatMessages);
        return $result;
    }

}