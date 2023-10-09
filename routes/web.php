<?php

use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('portal');
});

Route::get('/login', [UserController::class, 'loginView']);
Route::post('/login', [UserController::class, 'login']);

Route::get('/register', [UserController::class, 'registerView']);
Route::post('/register', [UserController::class, 'register']);
