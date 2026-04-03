<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\LoginController;

#auth - login
Route::get('/login', [LoginController::class , "index"] )->name('login');
Route::post('/login', [LoginController::class , "auth"] )->name('login.auth');


#home
Route::get('/', function () {
    return view('pages/index');
})->name('/');

#crud
Route::name("crud.")->middleware("auth")->group( function(){
    Route::get("/crud", function(){return view('pages/crud');})->name('index');
    Route::get("/crud/read", [CrudController::class, 'read'])->name('read');
    Route::post("/crud/add", [CrudController::class, 'add'])->name('add');
    Route::post("/crud/put", [CrudController::class, 'put'])->name('put');
    Route::get("/crud/delete", [CrudController::class, 'delete'])->name('delete');
});


