<?php
use Src\Route;

Route::get('/', "MainController:index");
Route::get('/chat/data', "MainController:getHistory");
Route::post('/', function() {
  echo "is POST!";
});
Route::put('/', function(){
  echo "but this is a PUT";
});

