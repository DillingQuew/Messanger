<?php
namespace Chat;

class ChatHandler {

  private static $path = '/Users/denisbazdarev/Programming/php/GeolocationApp/';
  public static function create(string $json = null) {
    $filename = self::$path . "messages/1.txt";

    if (!file_exists($filename)) {
      self::createFile($filename);
    } else {
      $file = fopen($filename, "a");
      fwrite($file, $json.PHP_EOL);
      fclose($file);
    }
  }

  private static function createFile($filename) {
    $file = fopen($filename, "w");
    fwrite($file, '');
    fclose($file);
  }
}