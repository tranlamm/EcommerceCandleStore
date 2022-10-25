<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\products\CandleProductController;
use App\Http\Controllers\products\EssentialOilController;
use App\Http\Controllers\products\ManufacturerController;

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

// Admin
Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
Route::resource('/admin/candleproduct', CandleProductController::class);
Route::resource('/admin/essentialoilproduct', EssentialOilController::class);
Route::resource('/admin/manufacturer', ManufacturerController::class);
