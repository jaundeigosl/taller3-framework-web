<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

#auth - login
Route::get('/login', [LoginController::class , "index"] )->name('login');

Route::name("login.")->middleware("auth")->group( function(){
    Route::post('/login', [LoginController::class , "auth"] )->name('auth');
    Route::get('/login/recovery', [LoginController::class , "passwRecovery"] )->name('recovery');
    Route::get('login/logout',[LoginController::class, 'logOut'])->name('logout');
});

#register
Route::name("register.")->group( function(){
    Route::get('/register', [RegisterController::class , "index"] )->name('index');
    Route::post('/register', [RegisterController::class , "register"] )->name('create');
});

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


