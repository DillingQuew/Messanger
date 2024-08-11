<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="/public/css/style.css" type="text/css" />
  <script src="/public/js/socket.js" type="text/javascript"></script>
</head>
<body>
    <div>
        <span>Сервер</span>
        <input id="server" type="text" value="" />
        <label for="name">Имя</label>
        <input type="text" id="name" name="name">
    </div>
    <div>
        <input id="connect" type="button" value="Установить соединение" />
        <input id="disconnect" type="button" value="Разорвать соединение" />
    </div>
    <div>
        <span>Сообщение</span>
        <input id="message" type="text" value="" />
        <input id="send-msg" type="button" value="Отправить сообщение" />
    </div>
    <div>
        <span>Информация</span>
        <div id="socket-info"></div>
    </div>
</body>
</html>