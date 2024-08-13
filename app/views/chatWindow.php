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
</div>