<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CrudController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;

#rutas publicas

#auth - login
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/login', [LoginController::class, 'auth'])->name('login.auth');
Route::get('/login/recovery', [LoginController::class, 'recoveryView'])->name('login.recovery_view');
Route::post('/login/recovery', [LoginController::class, 'recovery'])->name('login.recovery');
Route::post('/login/validate_recovery', [LoginController::class, 'validateSecAnswer'])->name('login.recovery_question');
Route::post('/login/new_password',[LoginController::class, 'newPassword'])->name('login.new_passowrd');

#auth- register
Route::name("register.")->group( function(){
    Route::get('/register', [RegisterController::class, 'index'])->name('index');
    Route::post('/register', [RegisterController::class, 'register'])->name('create');
});

Route::get('/', function () {
    return view('pages/index');
})->name('home'); 

#rutas privadas

Route::middleware("auth")->group( function(){
    Route::get('/logout', [LoginController::class, 'logOut'])->name('login.logout');

    Route::name("crud.")->group( function(){
        Route::get("/crud", [CrudController::class, 'index'])->name('index');
        Route::post("/crud/add", [CrudController::class, 'create'])->name('create');
        Route::post("/crud/put", [CrudController::class, 'put'])->name('put');
        Route::get("/crud/delete", [CrudController::class, 'delete'])->name('delete');
    });

});


