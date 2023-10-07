<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('portal');
});

Route::get('/register', function(){
    return "test sudah bisa";
});
 