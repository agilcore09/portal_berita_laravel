<?php

use App\Http\Controllers\BeritaController;
use App\Http\Controllers\PortalUserController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;


// login controller
Route::get('/login', [UserController::class, 'loginView'])->middleware('guest');
Route::post('/login', [UserController::class, 'login'])->middleware('guest');

// register controller
Route::get('/register', [UserController::class, 'registerView'])->middleware('guest');
Route::post('/register', [UserController::class, 'register'])->middleware('guest');
route::get('/logout', [UserController::class, 'logout'])->middleware('auth');

// portal berita Controller for user view
Route::get('/home', [PortalUserController::class, 'index']);
Route::get('/baca/{slug}', [PortalUserController::class, 'bacaBerita']);
Route::get('/kategori/{slug}', [PortalUserController::class, 'showByCategory']);

// dashboard controller
Route::get('/dashboard',  [BeritaController::class, 'showBerita']);
Route::get('/dashboard/{slug}',  [BeritaController::class, 'showDetail']);
Route::get('/tambah-berita', [BeritaController::class, 'tambahBerita']);
Route::post('/tambah-berita', [BeritaController::class, 'storeBerita']);
Route::get('/update-berita/{slug}', [BeritaController::class, 'updateShowBerita']);
Route::put('/update-berita/{slug}', [BeritaController::class, 'updateBerita']);
Route::get('/delete/{slug}', [BeritaController::class, 'deleteBerita']);
