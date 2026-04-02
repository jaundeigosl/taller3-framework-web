<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('pages/index');
})->name('/');

Route::get("/crud", function(){
    return view('pages/crud');
})->name('crud');
