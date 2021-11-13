<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MemberController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\AuthController;
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

Route::prefix('auth')->middleware(['auth','admin'])->group(function(){

    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/Product', ProductController::class);
    Route::resource('/Member', MemberController::class);
});
