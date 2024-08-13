<?php

namespace Src;
use PDO;
class Connection {
   
  private static PDO $db;
  public static function getInstance() {
    if (empty(self::$db)) {
      $host = '127.0.0.1';
      $db   = 'chat';
      $user = 'root';
      $pass = 'root';
      $charset = 'utf8';

      $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
      $opt = [
          PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
          PDO::ATTR_EMULATE_PREPARES   => false,
      ];
    
      self::$db = new PDO($dsn, $user, $pass, $opt);
    }
    return self::$db;
  }

  public function __construct() {}
  public function __clone() {}
  public function __wakeup() {}
}
