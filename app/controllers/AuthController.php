<?php
namespace App\Controllers;
use Src\Controller;


class AuthController extends Controller {
  public function index() {
    
    $this->view("welcome");
  }
}