<?php

use Illuminate\Support\Facades\Route;
// Admin
use App\Http\Controllers\AdminController;
use App\Http\Controllers\products\CandleProductController;
use App\Http\Controllers\products\EssentialOilController;
use App\Http\Controllers\products\ScentedWaxController;
use App\Http\Controllers\products\ManufacturerController;
// Login
use App\Http\Controllers\login\AdminLoginController;
use App\Http\Controllers\login\AuthController;
use App\Http\Controllers\login\CustomerController;

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
    // admin
Route::get('/admin/login', [ AuthController::class, 'getLoginAdmin'])->name('login.index');
Route::post('/admin/login/post', [ AuthController::class, 'postLoginAdmin'])->name('login.post');
Route::post('/admin/logout/post', [ AuthController::class, 'postLogoutAdmin'])->name('logout.post');
    // customer
Route::get('/customer/login', [ CustomerController::class, 'getLoginCustomer'])->name('login_customer.index');
Route::post('/customer/login/post', [ CustomerController::class, 'postLoginCustomer'])->name('login_customer.post');
Route::post('/customer/logout/post', [ CustomerController::class, 'postLogoutCustomer'])->name('logout_customer.post');

// Admin
Route::group(['middleware' => 'login_admin'], function() {
    // Admin Dashboard
    Route::get('/admin', [AuthController::class, 'getAdminPage'])->name('admin.index');
  
    // Products management
    Route::resource('/admin/candleproduct', CandleProductController::class);
    Route::resource('/admin/essentialoilproduct', EssentialOilController::class);
    Route::resource('/admin/scentedwaxproduct', ScentedWaxController::class);
    Route::resource('/admin/manufacturer', ManufacturerController::class);
    Route::get('/admin/manufacturer/{manufacturer}/allproducts', [ManufacturerController::class, 'allProducts'])->name('manufacturer.allproducts');
    Route::get('/admin/test', [EssentialOilController::class, 'test']);
});