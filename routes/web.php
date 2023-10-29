<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/home', [BeritaController::class, 'index']);

Route::get('/login', [UserController::class, 'loginView'])->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->middleware('guest');

Route::get('/register', [UserController::class, 'registerView'])->middleware('guest');
Route::post('/register', [UserController::class, 'register'])->middleware('guest');

route::get('/logout', [UserController::class, 'logout'])->middleware('auth');


Route::get('/dashboard', function () {
    return view('berita.index');
});
