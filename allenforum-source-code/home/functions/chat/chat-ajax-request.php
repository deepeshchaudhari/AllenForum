<?php
include "../../../config/session_header.php";
include "../../../config/configuration.php";
include_once "Chat.php";
$chat = new Chat();

/*
 * File Name : chat-ajax-request.php
 * Ajax Request File
 */
/*////////////////////////////////////////////////*/
$defaultUserImage = "ownImages/other/user.png";
/*/////////////////////////////////////////////////*/

/*
 * send Chat Message
 */
if (isset($_POST['sendChatMessage']) == 'sendChatMessage'){
    $chatWith = $_POST['chatWith'];
    $chatWithRole = $_POST['chatWithRole'];
    $chatMessage = $_POST['chatMessage'];
//    $userId = $_SESSION['userId'];
    $userId = $_SESSION['loginId'];

    $chatMessage = $chat->sendChatMessage($connection,$userId,$chatMessage,$chatWith,$chatWithRole);
    if ($chatMessage){
        echo "test^sent";
    }

}

/*
 * get Chat Messages
 */
if (isset($_POST['getChatMessage']) == 'getChatMessage'){
    $chatWith = $_POST['chatWith'];
    $chatWithRole = $_POST['chatWithRole'];
//    $userId = $_SESSION['userId'];
    $userId = $_SESSION['loginId'];

    $defaultProfile = 'ownImages/other/default-chat.png';

    $chatmessage = '';
    $messages = $chat->getForumChatMessages($connection,$userId,$chatWith,$chatWithRole);
    if ($messages->num_rows > 0)
    {
        while ($chatmessages = $messages->fetch_object())
        {
         $chatmessage .=
             '<div class="direct-chat-msg '.(($chatmessages->send_by)== $userId?'right':'').'" >
                <div class="direct-chat-info clearfix">
                    <span class="direct-chat-name pull-'.(($chatmessages->send_by)== $userId?'right':'left').' ">'.$chatmessages->person_name.'</span>
                    <span class="direct-chat-timestamp pull-'.(($chatmessages->send_by) == $userId?'left':'right').' ">'.date("l\, F jS\, Y",strtotime($chatmessages->chat_time)).'</span>
                </div>
                 <img class="direct-chat-img" src="'.(($chatmessages->person_profile)?"uploads/profilePic/students/".$chatmessages->person_profile :$defaultUserImage).'" alt="Chat Person Name">
                  <span class="direct-chat-text direct-chat-primary ">'.$chatmessages->message.'</span>
             </div>';

        }
    } else{
        $chatmessage .= '<center><img src="ownImages/other/chat-icon.png "/><h2>Join with Allenforum Chat !</h2></center>';
    }
    echo $chatmessage;

}