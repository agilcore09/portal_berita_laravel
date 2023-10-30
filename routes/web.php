<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// login controller
Route::get('/login', [UserController::class, 'loginView'])->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->middleware('guest');

// register controller
Route::get('/register', [UserController::class, 'registerView'])->middleware('guest');
Route::post('/register', [UserController::class, 'register'])->middleware('guest');

route::get('/logout', [UserController::class, 'logout'])->middleware('auth');

// dashboard controller
Route::get('/home', [BeritaController::class, 'index']);
Route::get('/dashboard',  [BeritaController::class, 'showBerita']);

Route::get('/tambah-berita', [BeritaController::class, 'tambahBerita']);
Route::post('/tambah-berita', [BeritaController::class, 'storeBerita']);
