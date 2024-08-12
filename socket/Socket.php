<?php

require_once "WebSocketServer.php";
$server = new WebSocketServer('192.168.0.10', 7777);
// максимальное время работы 100 секунд, выводить сообщения в консоль
$server->settings(300, true, true);

// эта функция вызывается, когда получено сообщение от клиента
$server->handler = function($connect, $data) use ($server){
    $connections = $server->getConnects(); 
    $jsonData = json_decode($data);
    foreach ($connections as $name => $connected) {
      if ($name == $jsonData->name) {
        $jsonData->name = $name;
        $data = json_encode((array)$jsonData);
        if ($connected instanceof Socket) {
          WebSocketServer::response($connected, $data);
        }
      }
    }
};

$server->startServer();