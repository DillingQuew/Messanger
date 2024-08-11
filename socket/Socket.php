<?php

require_once "WebSocketServer.php";
$server = new WebSocketServer('192.168.0.17', 7777);
// максимальное время работы 100 секунд, выводить сообщения в консоль
$server->settings(500, true, true);

// эта функция вызывается, когда получено сообщение от клиента
$server->handler = function($connect, $data) use ($server){
    $connections = $server->getConnects(); 
    foreach ($connections as $connected) {
     if ($connected instanceof Socket) {
      WebSocketServer::response($connected, $data);
     }
    }
};

$server->startServer();