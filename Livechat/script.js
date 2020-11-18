$(document).ready(function(){
    currentChannel = null;
    receivedMessages = [];

    setInterval(function() {
        displaymessage()
    }, 1000);

    function updateScroll() {
        // Check if they're at the bottom before updating
        $('ul').scrollTop($('ul')[0].scrollHeight);
    }

    $('#input').keyup(function(e){
        if(e.keyCode === 13){
                //alert("Enter was pressed ");
                var input = $('#input').val();
                if (input && (input = $.trim(input))) {
                    
                    $.ajax({
                        method: 'POST',
                        url: 'message.php',
                        data: {message: input, channel: currentChannel},
                        success: function(response) {
                            console.log(response);
                            $('#input').val('');
                        }
                    });
                }
         }  
    });

    function displaymessage(){
        $.ajax({
            url: 'message3.php',
            method: 'POST',
            data: {channel: currentChannel},
            success: function(response) {
                messages = response.split('&');
                messages.forEach(function(element) {
                    var msg_html = $.parseHTML(element)
                    $('li').each(function(idx, li) {
                        if (!receivedMessages.includes($(li).attr('message'))) {
                            receivedMessages.push($(li).attr('message'));
                        }
                    });
                    if (!receivedMessages.includes($(msg_html).attr('message')) && $(msg_html).attr('message') != undefined) {
                        $('.chatform').append(element)
                        updateScroll();
                    }
                });
            }   
        })
    }
    
    $('.buttonchatbox').click(function() {
        if ($(this).attr('channel') != currentChannel) {
            currentChannel = $(this).attr('channel');
            var chat = $('.chatform');
            chat.empty();
            receivedMessages = [];
            $.ajax({
                url: 'initial.php',
                method: 'POST',
                data: {channel: currentChannel},
                success: function(response) {
                    messages = response.split('&');
                    messages.forEach(element => chat.append(element))
                    updateScroll();
                }
            });   
        }
    });
});



