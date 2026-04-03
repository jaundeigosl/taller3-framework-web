<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\CrudController;

Route::get('/login', function () {
    return view('pages/login');
})->name('login');

Route::get('/', function () {
    return view('pages/index');
})->name('/');

Route::name("crud.")->middleware("auth")->group( function(){
    Route::get("/crud", function(){return view('pages/crud');})->name('index');
    Route::get("/crud/read", [CrudController::class, 'read'])->name('read');
    Route::post("/crud/add", [CrudController::class, 'add'])->name('add');
    Route::post("/crud/put", [CrudController::class, 'put'])->name('put');
    Route::get("/crud/delete", [CrudController::class, 'delete'])->name('delete');
});


