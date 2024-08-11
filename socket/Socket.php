<?php

require_once "WebSocketServer.php";
$server = new WebSocketServer('192.168.0.17', 7777);
// максимальное время работы 100 секунд, выводить сообщения в консоль
$server->settings(500, true, true);

// эта функция вызывается, когда получено сообщение от клиента
$server->handler = function($connect, $data) use ($server){
    $data = json_decode($data);
    $message = $data->name .": ".$data->data;
    // полученные от клиента данные отправляем обратно
    $connections = $server->getConnects(); 
    foreach ($connections as $connected) {
     if ($connected instanceof Socket) {
      WebSocketServer::response($connected, $message);
     }
    }
};

$server->startServer();