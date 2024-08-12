<?php
use Src\Route;

Route::get('/', "MainController:index");
Route::get('/chat/data', "MainController:getHistory");
Route::post('/auth', "AuthController:index");



