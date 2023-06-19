<?php

use App\Http\Controllers\HomeAdminController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UsersController;
use App\Http\Middleware\EnsureAuthAdmin;
use Illuminate\Support\Facades\Route;

Route::middleware(EnsureAuthAdmin::class)->group(function () {
    Route::get('/',[HomeAdminController::class,'index'])->name('index');
    Route::get('/produk',[ProductsController::class,'index'])->name('product.index');
    Route::post('/produk/store',[ProductsController::class,'store'])->name('product.store');
    Route::put('/produk/update{id}',[ProductsController::class,'update'])->name('product.update');
    Route::get('/produk/destroy{id}',[ProductsController::class,'destroy'])->name('product.destroy');

    Route::get('/transaksi',[TransactionController::class,'index'])->name('transaksi.index');
    Route::get('/transaksi/detail{id}',[TransactionController::class,'detail'])->name('transaksi.detail');
    Route::get('/transaksi/detail/update{id}',[TransactionController::class,'updateStatus'])->name('transaksi.update');

    Route::get('/user',[UsersController::class,'index'])->name('user.index');
    Route::get('/user/profile{id}',[UsersController::class,'profile'])->name('user.profile');
});
