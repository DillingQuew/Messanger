window.addEventListener('DOMContentLoaded', function () {

  var socket;
  const SOCKET_ADDRESS = "ws://192.168.0.17:7777";

  // показать сообщение в #socket-info
  function showMessage(message, style = null) {

      var div = document.createElement('div');
      div.className = style;
      div.appendChild(document.createTextNode(message));
      document.getElementById('socket-info').appendChild(div);
  }

  /*
   * Установить соединение с сервером и назначить обработчики событий
   */
  // document.getElementById('connect').onclick = function () {
      // новое соединение открываем, если старое соединение закрыто
      if (socket === undefined || socket.readyState !== 1) {
          // socket = new WebSocket(document.getElementById('server').value);
          socket = new WebSocket(SOCKET_ADDRESS);
      } else {
          showMessage('Надо закрыть уже имеющееся соединение');
      }

      /*
       * четыре функции обратного вызова: одна при получении данных и три – при изменениях в состоянии соединения
       */
      socket.onmessage = function (event) { // при получении данных от сервера
        let data = JSON.parse(event.data);
        let message = data.name + ": " + data.data;
        if (data.name == document.getElementById('name').value) {
          style = "right-side";
        } else {
          style = "left-side";
        }
        console.log(data);
          showMessage(message, style);
      }
      socket.onopen = function () { // при установке соединения с сервером
          showMessage('Соединение с сервером установлено');
      }
      socket.onerror = function(error) { // если произошла какая-то ошибка
          showMessage('Произошла ошибка: ' + error.message);
      };
      socket.onclose = function(event) { // при закрытии соединения с сервером
          showMessage('Соединение с сервером закрыто');
          if (event.wasClean) {
              showMessage('Соединение закрыто чисто');
          } else {
              showMessage('Обрыв соединения'); // например, «убит» процесс сервера
          }
          showMessage('Код: ' + event.code + ', причина: ' + event.reason);
      };
  // };

  /*
   * Отправка сообщения серверу
   */
  document.getElementById('send-msg').onclick = function () {
      if (socket !== undefined && socket.readyState === 1) {
          var message = document.getElementById('message').value;
          let name = document.getElementById('name').value;

          let data = {
            name: name,
            data: message
          }
          socket.send(JSON.stringify(data));
          document.getElementById('message').value = '';
          // showMessage(message);
      } else {
          showMessage('Невозможно отправить сообщение, нет соединения');
      }
  };

  /*
   * Закрыть соединение с сервером
   */
  document.getElementById('disconnect').onclick = function () {
      if (socket !== undefined && socket.readyState === 1) {
          socket.close();
      } else {
          showMessage('Соединение с сервером уже было закрыто');
      }
  };

});