<?php
namespace App\Controllers;
use Src\Controller;
class MainController extends Controller {
  public function index() {
    $this->view("welcome", [1,2,3, 5]);
  }
}