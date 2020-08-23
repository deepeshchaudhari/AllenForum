<?php include "../config/session_header.php"; ?>
<?php include "functions/chat/Chat.php";?>
<?php
$pageTitle = "Trending | Allenhouse Group of Colleges";
include('header.php');
?>
<?php
$activeTabDash = "active";
$activeLinkDash = "active";
include('sidebar.php');
?>
<?php
if (isset($_GET['chatwith']) && $_GET['chatwith'] != '' && $_GET['usertype'])
{
    $chatwith = base64_decode($_GET['chatwith']);
    $chatRole = base64_decode($_GET['usertype']);
    $chat = new Chat();
    $person = $chat->getChatingPersonDetail($connection,$chatwith,$chatRole);
    if ($person->num_rows > 0)
    {
        $personDetails = $person->fetch_object();
        $personName = $personDetails->person_name;
        $personProfile = $personDetails->person_profile;
        $messages = $chat->getForumChatMessages($connection,$_SESSION['userId'],$chatwith,$chatRole);
    } else{
        $personName = 'User';
        $personProfile = 'ownImages/other/default-chat.png';
    }

    $defaultProfile = 'ownImages/other/default-chat.png';



} else{
    header("Location:404.php");
}
?>
<div class="content-wrapper">
    <section class="content">
        <div class="row">
            <div class="col-lg-12">
                <div class="box box-widget widget-user">
                    <div class="box-footer">
                        <div class="post">
                            <div class="box-comment">
                                <div class="row">
                                    <div class="box-body direct-chat direct-chat-primary">
                                        <div class="box-header with-border">
                                            <h3 class="box-title">
                                                <a href="forum-discussion-personal.php?action=discuss&type=single"> <img src="ownImages/other/left-arrow.png" style=""><img class="img-circle" src="<?php if ($personProfile) {echo 'uploads/profilePic/students/'.$personProfile;} else { echo 'ownImages/other/user.png';} ?>" width="40" height="40"></a>
                                                <?php echo ucwords($personName);?>
                                            </h3>
                                            <div class="box-tools pull-right">
                                                <a href="#" id="refresh-chat" onclick="getChatMessages();"> <i class="glyphicon glyphicon-refresh"></i></a>
                                                <button type="button" class="btn btn-box-tool" ><i class="glyphicon glyphicon-option-vertical"></i></button>
                                            </div>
                                        </div>
                                        <div class="direct-chat-messages" style="height: 400px;">
                                            <center><img src="ownImages/other/loading/blue_loading.gif" id="chatLoader" width="100" height="100" style="display: none;"></center>
                                          <div id="load-chat-messages"></div>
                                        </div>
                                        <div class="box-footer">
                                            <form id="sendChatMsgForm">
                                                <div class="input-group">
                                                    <input type="hidden" name="chatWith" id="chatWith" value="<?php echo @$chatwith;?>">
                                                    <input type="hidden" name="chatWithRole" id="chatWithRole" value="<?php echo @$chatRole;?>">
                                                    <input type="hidden" name="sendMessageSound" id="sendMessageSound" value="<?php echo 'javaScript/chat/sendMessageSound.m4a';?>" />
                                                    <input type="text" name="chatMessage" id="chatMessage" placeholder="Type Message ..." class="form-control">
                                                    <span class="input-group-btn">
                                                      <button type="submit" class="btn btn-primary btn-flat" id="sendMsgBtn"  >Send <img src="ownImages/other/send.png" /></button>
                                                    </span>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?php include('footer.php');?>
    <script type="text/javascript">
        window.onload = function() {
            getChatMessages();
        };
    </script>
<?php
/*
 * #this form submittion of chat can be found in javascript
 * javascript/chat/chat.js
 */

