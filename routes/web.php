<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('portal');
});

Route::get('/login', function(){
    return view('dashboard.login');
});

Route::get('/register', function(){
    return view('dashboard.register');
});