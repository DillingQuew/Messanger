<?php
use WebSocket\WebSocketServer;
use Chat\ChatHandler;

require_once "WebSocketServer.php";
require_once "chat/ChatHandler.php";

$server = new WebSocketServer('192.168.0.10', 7777);
// максимальное время работы 100 секунд, выводить сообщения в консоль
$server->settings(300, true, false);

// эта функция вызывается, когда получено сообщение от клиента
$server->handler = function($connect, $data) use ($server) {
    $connections = $server->getConnects(); 
    $jsonData = json_decode($data);
    ChatHandler::create($data);
    if (!empty($connections[$jsonData->to])) {
      WebSocketServer::response($connections[$jsonData->to], $data);
    }
};

$server->startServer();