<?php

namespace Src;
use PDO;
class Connection {
   
  protected static PDO $db;
  public function __construct() {
    if (!self::$db instanceof PDO) {
      $host = '127.0.0.1';
      $db   = '';
      $user = 'root';
      $pass = '';
      $charset = 'utf8';

      $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
      $opt = [
          PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
          PDO::ATTR_EMULATE_PREPARES   => false,
      ];
    
      self::$db = new PDO($dsn, $user, $pass, $opt);
    }
    self::getInstance();
  }

  private static function getInstance() {
    return self::$db;
  }
}