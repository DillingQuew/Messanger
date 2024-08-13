<?php
namespace App\Models;
use Src\Connection;

class ChatModel {
  public static function findOrCreate() {

  }

  public static function findChat() {
    $db = Connection::getInstance();
    $query = "SELECT * FROM Users WHERE login = :login AND pass = :pass";
    $stmt = $db->prepare($query);
    $stmt->execute(["login" => $login, "pass" => $pass]);
    $result = $stmt->fetchObject();
    return $result;
  }
}