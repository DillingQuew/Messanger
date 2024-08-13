<?php
namespace App\Controllers;
use Src\Controller;
use App\Models\UserModel;
class ChatController extends Controller {
  public function index() {
    session_start();
    $user_id = $_SESSION['userId'];
    
    if ($user_id) {
      $user = UserModel::findById($user_id);
      $anotherUsers = UserModel::getAnotherUsers($user_id);
      return $this->view('chat', ['user' => $user, 'users' => $anotherUsers]);
      
    } else {
      header("Location: /");
    }
  }
}
