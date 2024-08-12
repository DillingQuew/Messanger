<?php
namespace App\Controllers;
use Src\Controller;
use Chat\ChatHandler;
class MainController extends Controller {
  public function index() {
    
    
    $this->view("welcome");
  }

  public function getHistory() {
    $history = ChatHandler::getChatHistory(__ROOT__."messages/1.txt");
    echo json_encode($history);
  }
}