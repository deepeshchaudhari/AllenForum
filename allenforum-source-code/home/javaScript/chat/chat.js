/*
File Name : chat.js
Send Chat Message
 */

$("form#sendChatMsgForm").on('submit',function (event) {
    event.preventDefault();
    var chatMessage = $("#chatMessage").val();
    var chatWith = $("#chatWith").val();
    var chatWithRole = $("#chatWithRole").val();

    if (chatMessage != "") {
       playSendMessageSound('javaScript/chat/sendMessageSound.M4A');
        $.post("functions/chat/chat-ajax-request.php", {
            sendChatMessage: 'sendChatMessage',
            chatWith: chatWith,
            chatMessage: chatMessage,
            chatWithRole:chatWithRole
        }, function (response) {
           var status = response.split('^');
           if (status[1] == "sent"){
               //window.location.reload();
               $("form#sendChatMsgForm").each(function () {
                   this.reset();
               });
               getChatMessages();
           }
        });
    }
});

/*
get chat Messages
 */

function getChatMessages() {
    $("#chatLoader").show();
    var chatWith = $("#chatWith").val();
    var chatWithRole = $("#chatWithRole").val();

    $.post("functions/chat/chat-ajax-request.php",{getChatMessage:'getChatMessage',chatWith:chatWith,chatWithRole:chatWithRole},function (response) {
        //alert(response);
        $("#load-chat-messages").html(response);
        $("#chatLoader").hide();
    });
}

    /*
    play message sent sound
     */

    function playSendMessageSound(sountAudio) {

            var audio = new Audio(sountAudio);
            audio.play()

    }