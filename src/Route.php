<?php
namespace Src;
use App\Controllers;
use Src\Helpers\RouteHelper;

class Route {
  use RouteHelper;
  private static array $methods = ['get', 'post', 'put', 'delete'];

  public static function __callStatic($name, $arguments) {
    list($uri, $callback) = $arguments;
    if (in_array($name, self::$methods)) {
      self::delegateRequest($name, $uri, $callback);
    }
  }

  private static function delegateRequest($method, $uri, $callback) {
    if (self::ValidateRoute($method, $uri)) {
      if (is_callable($callback)) {
        $callback();
      } else {
        self::ParseController($callback);
      }
    }
  }
}


