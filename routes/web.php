<?php

use App\Http\Controllers\orderController;
use App\Http\Controllers\userController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});




Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// user 
Route::get('/user', [userController::class, 'index'])->name('index');
Route::get('/user/create', [userController::class, 'create'])->name('user.create');
Route::post('/user/store', [userController::class, 'store'])->name('user.store');
Route::get('/user/edit/{id}', [userController::class, 'edit'])->name('user.edit');
Route::put('/user/update/{id}', [userController::class, 'update'])->name('user.update');
Route::delete('/user/destroy/{id}', [userController::class, 'destroy'])->name('user.destroy');


//produk
Route::get('/produk',[produkController::class, 'index'])->name('index');

//order

Route::get('/order', [orderController::class, 'index'])->name('index');