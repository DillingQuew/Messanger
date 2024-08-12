<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="/public/css/style.css" type="text/css" />
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="/public/js/socket.js" type="text/javascript"></script>
  <script src="/public/js/main.js" type="text/javascript"></script>
</head>
<body>
    <div>
      <div>
      <label for="from">Твой ник
          <input type="text" id="from" name="nickname">
        </label>
        <button id="accept-nickname">Применить</button>
      </div>
        <label for="to">Кому
          <input type="text" id="to" name="to">
        </label>
    </div>

    <div class="chat-container">
        <div id="socket-info"></div>
        <div class="input-wrapper">        
          <input id="message" type="text" value="" />
          <input id="send-msg" type="button" value="Отправить" />
      </div>
    <div>
       
    </div>
    </div>
</body>
</html>