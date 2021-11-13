<?php

use App\Http\Controllers\AddCartController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DetailController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('Login', [AuthController::class, 'index'])->name('login');
Route::post('Login/Load', [AuthController::class, 'login'])->name('login-load');
Route::get ('Logout', [AuthController::class, 'logout'])->name('logout');
Route::get ('Logout-Cart', [AuthController::class, 'logoutcart'])->name('logout-cart');

Route::middleware('auth')->group(function(){
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::get('/Cart', [CartController::class, 'index'])->name('cart');
    Route::post('/checkout', [CartController::class, 'transaction'])->name('checkout');
    Route::get('/Cart-remove/{id}', [CartController::class,'delete'])->name('cart-delete');
    Route::post('/Add-Cart/{id}', [AddCartController::class, 'add'])->name('add-cart');
    Route::get('/Detail/{id}', [DetailController::class, 'index'])->name('detail');
});

Route::prefix('auth')->middleware(['auth','admin'])->group(function(){

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/Product', ProductController::class);
    Route::resource('/Member', MemberController::class);
    Route::get('/Queue', [TransactionController::class, 'index'])->name('queue');
    Route::get('/Transaction-Sukses', [TransactionController::class, 'transaksisukses'])->name('transaction-sukses');
    Route::get('/Transaction-Gagal', [TransactionController::class, 'transaksigagal'])->name('transaction-gagal');
    Route::get('/Queue/{id}', [TransactionController::class, 'detail'])->name('queue-detail');
    Route::get('/Queue/Sukses/{id}', [TransactionController::class, 'sukses'])->name('queue-sukses');
    Route::get('/Queue/Batalkan/{id}', [TransactionController::class, 'batal'])->name('queue-batal');
});
