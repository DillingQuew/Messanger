<?php
use Src\Route;

Route::get('/', "MainController:index");
Route::get('/chat/data', "MainController:getHistory");
Route::get('/chat', "ChatController:index");
Route::post('/auth', "AuthController:index");



