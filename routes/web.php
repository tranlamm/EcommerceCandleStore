<?php

use Illuminate\Support\Facades\Route;
// Admin
use App\Http\Controllers\AdminController;
use App\Http\Controllers\products\CandleProductController;
use App\Http\Controllers\products\EssentialOilController;
use App\Http\Controllers\products\ManufacturerController;
// Login
use App\Http\Controllers\login\AdminLoginController;
use App\Http\Controllers\login\AuthController;

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

Route::get('/', function () {
    return view('welcome');
});

// Login
Route::resource('/admin/login', AdminLoginController::class);
Route::post('/login_admin',[ AuthController::class, 'loginAdmin'])->name('login_admin');

// Admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    // Products management
Route::resource('/admin/candleproduct', CandleProductController::class);
Route::resource('/admin/essentialoilproduct', EssentialOilController::class);
Route::resource('/admin/manufacturer', ManufacturerController::class);
Route::get('/admin/test', [EssentialOilController::class, 'test']);