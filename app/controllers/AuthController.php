<?php
namespace App\Controllers;
use Src\Controller;
use App\Models\UserModel;

class AuthController extends Controller {
  public function index() {
    $login = $_POST['login'];
    $pass = $_POST['pass'];
    $user = UserModel::getUser($login, $pass);
    if ($user) {
      session_start();
      $_SESSION['userId'] = $user->id;
      echo true;
    } else {
      echo false;
    }
  }
}