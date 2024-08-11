<?php

namespace Src;

trait View {
  public function view(string $string, array $data = null):void {
    if (file_exists('app/views/'.$string.".php")) {
      require_once 'app/views/'.$string.".php";
    }
  }
}