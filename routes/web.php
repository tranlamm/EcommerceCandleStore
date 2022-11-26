<?php

use Illuminate\Support\Facades\Route;
// Admin
use App\Http\Controllers\AdminController;
use App\Http\Controllers\products\CandleProductController;
use App\Http\Controllers\products\EssentialOilController;
use App\Http\Controllers\products\ScentedWaxController;
use App\Http\Controllers\products\ManufacturerController;

use App\Http\Controllers\invoices\ImportInvoiceController;
use App\Http\Controllers\invoices\ExportInvoiceController;
use App\Http\Controllers\invoices\OnlineInvoiceController;

use App\Http\Controllers\accounts\CustomerAccountController;
// Login
use App\Http\Controllers\login\AdminLoginController;
use App\Http\Controllers\login\AuthController;
use App\Http\Controllers\login\CustomerLoginController;
use App\Http\Controllers\customer\CustomerController;

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

// Login
    // Admin
Route::get('/admin/login', [ AuthController::class, 'getLoginAdmin'])->name('login.index');
Route::post('/admin/login/post', [ AuthController::class, 'postLoginAdmin'])->name('login.post');
Route::post('/admin/logout/post', [ AuthController::class, 'postLogoutAdmin'])->name('logout.post');
    // Customer
Route::get('/customer/login', [ CustomerLoginController::class, 'getLoginCustomer'])->name('login_customer.index');
Route::post('/customer/login/post', [ CustomerLoginController::class, 'postLoginCustomer'])->name('login_customer.post');
Route::post('/customer/register/post', [ CustomerLoginController::class, 'postRegisterCustomer'])->name('register_customer.post');
Route::post('/customer/logout/post', [ CustomerLoginController::class, 'postLogoutCustomer'])->name('logout_customer.post');

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

    // Invoices management
    Route::resource('/admin/invoice/importinvoice', ImportInvoiceController::class);
    Route::resource('/admin/invoice/exportinvoice', ExportInvoiceController::class);
    Route::resource('/admin/invoice/onlineinvoice', OnlineInvoiceController::class);
    Route::get('/admin/invoice/onlineinvoice/finish/{id}', [OnlineInvoiceController::class, 'finish'])->name('onlineinvoice.finish');
    Route::get('/admin/invoice/onlineinvoice/cancel/{id}', [OnlineInvoiceController::class, 'cancel'])->name('onlineinvoice.cancel');

    // Account management
    Route::resource('/admin/customeraccount', CustomerAccountController::class);
});

// Customer
Route::get('/', [CustomerController::class, 'shopIndex'])->name('shop.index');
Route::get('/customer/product', [CustomerController::class, 'productShow'])->name('product.index');
Route::get('/customer/product/{id}/detail', [CustomerController::class, 'productDetail'])->name('product.detail');

// Customer Middleware
Route::group(['middleware' => 'login_customer'], function() {
    // Cart
    Route::get('/customer/cart', [CustomerController::class, 'cartShow'])->name('cart.index');
    Route::post('/customer/deletecartitem', [CustomerController::class, 'deleteItemCart'])->name('product.deletecartitem');
    Route::post('/customer/deleteallcart', [CustomerController::class, 'deleteAllCart'])->name('product.deleteallcart');
    Route::post('/customer/product/{id}/addcart', [CustomerController::class, 'addProductToCart'])->name('product.addcart');
    Route::post('/customer/checkout', [CustomerController::class, 'checkout'])->name('product.checkout');

    // Account
    Route::get('/customer/account/{id}', [ CustomerLoginController::class, 'showAccountInfo'])->name('account.index');
    Route::post('/customer/changeinfo/{id}', [ CustomerLoginController::class, 'changeAccountInfo'])->name('info.change');
    Route::post('/customer/changepassword/{id}', [ CustomerLoginController::class, 'changePassword'])->name('password.change');

    // Invoice
    Route::get('/customer/invoice/{id}', [ CustomerController::class, 'invoiceShow'])->name('invoice.index');

    // Review
    Route::post('/customer/review/{customer_id}/{product_id}', [ CustomerController::class, 'postReview'])->name('review.post');
    Route::post('/customer/comment/{customer_id}/{product_id}', [ CustomerController::class, 'postComment'])->name('comment.post');
    Route::delete('/customer/comment/{customer_id}/{product_id}/delete', [ CustomerController::class, 'deleteComment'])->name('comment.delete');
});