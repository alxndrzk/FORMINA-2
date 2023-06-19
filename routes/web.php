<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductContoller;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfilesController;
use App\Http\Controllers\ShopCartsController;
use App\Http\Controllers\TransactionController;
use App\Http\Middleware\EnsureAuthAdmin;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('home.index');
// });

Route::get('/',[HomeController::class,'index'])->name('home.index');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {


    
    Route::get('/profile', [ProfilesController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/store', [ProfilesController::class, 'store'])->name('profile.store');
    Route::patch('/profile', [ProfilesController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfilesController::class, 'destroy'])->name('profile.destroy');

    Route::get('/katalog',[HomeController::class,'katalog'])->name('home.katalog');

    Route::get('/katalog/detail{id}',[ProductsController::class,'show'])->name('product.detail');

    Route::post('/keranjang/store',[ShopCartsController::class,'store'])->name('cart.store');
    Route::post('/keranjang/update',[ShopCartsController::class,'update'])->name('cart.update');
    Route::get('/keranjang',[ShopCartsController::class,'index'])->name('cart.index');
    Route::get('/keranjang/delete{id}',[ShopCartsController::class,'destroy'])->name('cart.destroy');

    Route::get('/checkout',[TransactionController::class,'beforecheckout'])->name('checkout.before');
    Route::post('/checkout/post',[TransactionController::class,'checkout'])->name('checkout');
});


require __DIR__.'/auth.php';
