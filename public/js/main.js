$(document).ready(function(){
  $('#accept-nickname').on('click', function() {
    let name = $('#from').val();
    if (name != '') {
      getChatHistory(name);
    }
  })
  function getChatHistory(name = null) {
    $.get('/chat/data', {}, function(data) {
      data = JSON.parse(data);
      data.forEach(function(data, index) {
        let message = JSON.parse(data);
        let cloudMessage = document.createElement('div');

        if (message.from == name) {
          cloudMessage.className = 'right-side';
        } else {
          cloudMessage.className = 'left-side';
        }
         console.log(message.from, message.to, name);
        cloudMessage.innerText = message.from + " :" + message.message
        $('#socket-info').append(cloudMessage)
        
      })
    });
  }
})