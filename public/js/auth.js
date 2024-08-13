$(document).ready(function() {
  $("#auth-form").on('submit', function(e) {
    e.preventDefault();
    $.post('/auth', $(this).serialize(), function(data){
      if (data == true) {
        window.location.href ="/chat";
      }
  });
  })
})