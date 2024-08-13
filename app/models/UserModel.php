<?php
namespace App\Models;
use Src\Connection;

class UserModel {
  private $name;
  private $pass;
  public static function getUser($login, $pass) {
    $db = Connection::getInstance();
    $query = "SELECT * FROM Users WHERE login = :login AND pass = :pass";
    $stmt = $db->prepare($query);
    $stmt->execute(["login" => $login, "pass" => $pass]);
    $result = $stmt->fetchObject();
    return $result;
  }
  public static function findById($id) {
    $db = Connection::getInstance();
    $query = "SELECT * FROM Users WHERE id = :id";
    $stmt = $db->prepare($query);
    $stmt->execute(["id" => $id]);
    $result = $stmt->fetchObject();
    return $result;
  }
  public static function getAnotherUsers($id) {
    $db = Connection::getInstance();
    $query = "SELECT * FROM Users WHERE id != :id";
    $stmt = $db->prepare($query);
    $stmt->execute(["id" => $id]);
    $result = $stmt->fetchAll();
    return $result;
  }
}