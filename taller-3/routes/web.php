<?php

use Illuminate\Support\Facades\Route;
use app\Http\Controllers\CrudController;

Route::get('/', function () {
    return view('pages/index');
})->name('/');

Route::get("/crud", function(){
    return view('pages/crud');
})->name('crud');

Route::name("crud-controller")->group( function(){
    Route::get("/crud/read", [CrudController::class, 'read'])->name('read');
    Route::post("/crud/add", [CrudController::class, 'add'])->name('add');
    Route::post("/crud/put", [CrudController::class, 'put'])->name('put');
    Route::get("/crud/delete", [CrudController::class, 'delete'])->name('delete');
});


