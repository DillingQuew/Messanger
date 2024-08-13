$(document).ready(function(){
  $('.chat__item').on('click', function() {
    let member_to = $(this).data('name'),
        member_from = $('#account-name').data('name');
    let data = [{member: member_to}, {member: member_from}];
    if (member_to != '') {
      getChatHistory(data);
    }
  })
  function getChatHistory(json) {
    console.log(json);
    $.ajax({
      url:'/chat/data',
      dataType: "html",
      method: "GET",
      data: {data: json} ,
      success: function(data) {
        console.log(data);
        // data = JSON.parse(data);
        // data.forEach(function(data, index) {
        //   let message = JSON.parse(data);
        //   let cloudMessage = document.createElement('div');

        //   $(cloudMessage).addClass('chat__message');
        //   if (message.from == name) {
        //     $(cloudMessage).addClass('chat__message--right');
        //   } else {
        //     $(cloudMessage).addClass('chat__message--left');
        //   }
          
        //   console.log(message.from == name);
        //   cloudMessage.innerText = message.from + " :" + message.message
        //   $('#chat_window').append(cloudMessage)
          
        // })
      }
    });
  }
})