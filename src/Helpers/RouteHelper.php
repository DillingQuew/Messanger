<?php
namespace Src\Helpers;
trait RouteHelper {
  private static function ParseController($string) {
    list($name, $function) = explode(":", $string);
    if (strpos($name, 'Controller')) {
      if (file_exists('app/controllers/'.$name.".php")) {
        $className = "App\Controllers\\$name";
        $controller = new $className();
        $controller->$function();
      }
    }
  }

  private static function ValidateRoute($method, $uri) {
    if($method == $_SERVER['REQUEST_METHOD'] && $uri == $_SERVER['REQUEST_URI']) {
      return true;
    }
    return false;
  }

}