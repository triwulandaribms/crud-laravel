<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\produkController;
use App\Http\Controllers\transaksiController;
use App\Http\Controllers\userController;


Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// TABEL USERS
Route::get('/user', [userController::class, 'index']);
Route::get('/user/{id}', [userController::class, 'show']);
Route::post('/addUser', [userController::class, 'store']);
Route::put('/edit/{id}', [userController::class, 'update']);
Route::delete('/hapus', [userController::class, 'destroy']);



// TABEL PRODUKS
Route::get('/produk', [produkController::class, 'index']);
Route::get('/produk/{id}', [produkController::class, 'show']);
Route::post('/addProduk', [produkController::class, 'store']);
Route::put('/updateProduk/{id}', [produkController::class, 'update']);
Route::delete('/hapus', [produkController::class, 'destroy']);


//TABEL ORDERS
Route::get('/order', [orderController::class, 'index']);
Route::get('/order/{id}', [orderController::class, 'indexOrderId']);
Route::post('/addOrder', [orderController::class, 'store']);
Route::get('/exportFile', [orderController::class, 'exportExcel']);





