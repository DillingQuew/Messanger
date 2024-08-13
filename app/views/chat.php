<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
  <link rel="stylesheet" href="/public/css/style.css" type="text/css" />
  <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
  <script src="/public/js/socket.js" type="text/javascript"></script>
  <script src="/public/js/main.js" type="text/javascript"></script>
</head>
<body>
   <div class="container">
      <div class="chat glass-container">
        <div class="chat chat__grid">
          <div class="chat__contacts">
            <div class="chat__account">
              <div class="chat__logo">
                <img class="chat__avatar" src="/public/img/avatars/avatar_example.png" alt="">
              </div>
              <div class="chat__name" id="account-name" data-name="<?php echo $data['user']->login?>"> <?php echo $data['user']->login ?></div>
            </div>
            <ul class="chat__list">
              <?php foreach ($data['users'] as $user) {?>              
                <li class="chat__item" data-name="<?php echo $user['login']?>">
                  <div class="chat__logo"><img class="chat__avatar" src="/public/img/avatars/avatar_example.png" alt=""></div>
                  <div class="chat__name" data-id="<?php echo $user['id']?>"><?php echo $user['login']?></div>
                </li>
              <?php } ?>
            </ul>
          </div>
          <div class="chat__wrapper">
            <div class="chat__header">
            </div>

            <!-- <p>Тут пока ничего нет</p> -->
            <div id="chat_window" class="chat__window">
            </div>
            <div class="chat__input-wrapper">        
                <input id="chat-input" class="chat__input" type="text" value="" />
                <input id="chat-send-msg" class="chat__send-msg" type="button"/>
            </div>
          </div>
        </div>
      </div>
   </div>
</body>
</html>