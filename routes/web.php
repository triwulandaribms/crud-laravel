<?php

use App\Http\Controllers\transactionController;
use App\Http\Controllers\gabungController;
use App\Http\Controllers\userController;
use App\Http\Controllers\produkController;
// use APP\Http\Controllers\excelController;
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
Route::get('/produk/create', [produkController::class, 'create'])->name('produk.create');
Route::post('/produk/store', [produkController::class, 'store'])->name('produk.store');
Route::get('/produk/edit/{id}', [produkController::class, 'edit'])->name('produk.edit');
Route::put('/produk/update/{id}', [produkController::class, 'update'])->name('produk.update');
Route::delete('/produk/destroy/{id}', [produkController::class, 'destroy'])->name('produk.destroy');

//transaction
Route::get('/transaction', [transactionController::class, 'index'])->name('index');
Route::get('/transaction/create', [transactionController::class, 'create'])->name('transaction.create');
Route::post('/transaction/store', [transactionController::class, 'store'])->name('transaction.store');
Route::get('/transaction/edit/{id}', [transactionController::class, 'edit'])->name('transaction.edit');
Route::put('/transaction/update/{id}', [transactionController::class, 'update'])->name('transaction.update');
Route::delete('/transaction/destroy/{id}', [transactionController::class, 'destroy'])->name('transaction.destroy');


// tampil gabungan
Route::get('/tampil', [gabungController::class, 'lihatGabung'])->name('lihatGabung');
// Route::get('/excel')
