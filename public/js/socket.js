window.addEventListener('DOMContentLoaded', function () {
  let to = "";
  $('.chat__item').on('click', function() {
    let to_name = $(this).data('name');
    to = to_name;
  })
  function deleteAllCookies() {
    document.cookie.split(';').forEach(cookie => {
        const eqPos = cookie.indexOf('=');
        const name = eqPos > -1 ? cookie.substring(0, eqPos) : cookie;
        document.cookie = name + '=;expires=Thu, 01 Jan 1970 00:00:00 GMT';
    });
  }

  var socket;
  let SOCKET_ADDRESS = "ws://192.168.0.10:7777/?name=";

  // показать сообщение в #socket-info
  function showMessage(text, style = null) {

      let message = document.createElement('div');
      $(message).addClass('chat__message ' + style );
      $(message).text(text);
      // div.appendChild(document.createTextNode(text));
      $('#chat_window').append(message);
      // document.getElementById('chat_window')
  }

  /*
   * Установить соединение с сервером и назначить обработчики событий
   */
  // document.getElementById('accept-nickname').onclick = function () {
      // новое соединение открываем, если старое соединение закрыто
      if (socket === undefined || socket.readyState !== 1) {
        let name = $("#account-name").data('name');
        console.log(name);
          // socket = new WebSocket(document.getElementById('server').value);
          SOCKET_ADDRESS+=name;
          socket = new WebSocket(SOCKET_ADDRESS);
      } else {
          showMessage('Надо закрыть уже имеющееся соединение');
      }

      console.log(socket);

      /*
       * четыре функции обратного вызова: одна при получении данных и три – при изменениях в состоянии соединения
       */
      socket.onmessage = function (event) { // при получении данных от сервера
        let data = JSON.parse(event.data);
        console.log(data);
        let message = data.from + ": " + data.message;
          style = "chat__message--left";
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
  document.getElementById('chat-send-msg').onclick = function () {
      if (socket !== undefined && socket.readyState === 1) {
          var message = document.getElementById('chat-input').value;
              from = document.getElementById('account-name').value;

          let data = {
            from: from,
            to: to,
            message: message,
            date: Date.now()
          }
          socket.send(JSON.stringify(data));
          document.getElementById('chat-input').value = '';
          showMessage(message, 'chat__message--left');
      } else {
          showMessage('Невозможно отправить сообщение, нет соединения');
      }
  };

  /*
   * Закрыть соединение с сервером
   */
  // document.getElementById('disconnect').onclick = function () {
  //     if (socket !== undefined && socket.readyState === 1) {
  //         socket.close();
  //     } else {
  //         showMessage('Соединение с сервером уже было закрыто');
  //     }
  // };

});