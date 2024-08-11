<?php
namespace Src;
use App\Controllers;
use Src\Helpers\RouteHelper;

class Route {
  use RouteHelper;
  public static function get(string $uri, $callback) {
    if (self::ValidateRoute('GET', $uri)) {
      if (is_callable($callback)) {
        $callback();
      } else {
        self::ParseController($callback);
      }
    }
  }
  public static function post(string $uri, $callback) {
    if (self::ValidateRoute('POST', $uri)) {
      if (is_callable($callback)) {
        $callback();
      } else {
        self::ParseController($callback);
      }
    }
  }
  public static function put(string $uri, $callback) {
    if (self::ValidateRoute('PUT', $uri)) {
      if (is_callable($callback)) {
        $callback();
      } else {
        self::ParseController($callback);
      }
    }
  }
  public static function delete(string $uri, $callback) {
    if (self::ValidateRoute('DELETE', $uri)) {
      if (is_callable($callback)) {
        $callback();
      } else {
        self::ParseController($callback);
      }
    }
  }
}


