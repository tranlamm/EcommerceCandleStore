<?php

use Illuminate\Support\Facades\Route;
// Admin
use App\Http\Controllers\admin\products\CandleProductController;
use App\Http\Controllers\admin\products\EssentialOilController;
use App\Http\Controllers\admin\products\ScentedWaxController;
use App\Http\Controllers\admin\products\ManufacturerController;
use App\Http\Controllers\admin\products\ReviewController;

use App\Http\Controllers\admin\invoices\ImportInvoiceController;
use App\Http\Controllers\admin\invoices\ExportInvoiceController;
use App\Http\Controllers\admin\invoices\OnlineInvoiceController;

use App\Http\Controllers\admin\accounts\CustomerAccountController;

use App\Http\Controllers\admin\comments\AdminCommentController;

use App\Http\Controllers\admin\statistics\StatisticController;

// Login
use App\Http\Controllers\login\AdminLoginController;
use App\Http\Controllers\login\CustomerLoginController;

// Customer
use App\Http\Controllers\customer\ShopController;
use App\Http\Controllers\customer\CartController;
use App\Http\Controllers\customer\InvoiceController;
use App\Http\Controllers\customer\CommentController;

// API
use App\Http\Controllers\chat\ChatCustomerAPI;
use App\Http\Controllers\chat\ChatAdminAPI;
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
Route::get('/admin/login', [ AdminLoginController::class, 'getLoginAdmin'])->name('login.index');
Route::post('/admin/login/post', [ AdminLoginController::class, 'postLoginAdmin'])->name('login.post');
Route::post('/admin/logout/post', [ AdminLoginController::class, 'postLogoutAdmin'])->name('logout.post');
    // Customer
Route::get('/customer/login', [ CustomerLoginController::class, 'getLoginCustomer'])->name('login_customer.index');
Route::post('/customer/login/post', [ CustomerLoginController::class, 'postLoginCustomer'])->name('login_customer.post');
Route::post('/customer/register/post', [ CustomerLoginController::class, 'postRegisterCustomer'])->name('register_customer.post');
Route::post('/customer/logout/post', [ CustomerLoginController::class, 'postLogoutCustomer'])->name('logout_customer.post');

// Admin
Route::group(['middleware' => 'login_admin'], function() {
    // Admin Dashboard
    Route::get('/admin', [StatisticController::class, 'showDashboard'])->name('admin.index');
    Route::get('/admin/chat', [ChatAdminAPI::class, 'index'])->name('admin.chat');
  
    // Products management
    Route::resource('/admin/candleproduct', CandleProductController::class);
    Route::resource('/admin/essentialoilproduct', EssentialOilController::class);
    Route::resource('/admin/scentedwaxproduct', ScentedWaxController::class);
    Route::resource('/admin/manufacturer', ManufacturerController::class);
    Route::get('/admin/manufacturer/{manufacturer}/allproducts', [ManufacturerController::class, 'allProducts'])->name('manufacturer.allproducts');
    Route::get('/admin/product/{id}/reviews', [ReviewController::class, 'showReview'])->name('product.review');
    Route::delete('/admin/product/{id}/comment/delete', [ReviewController::class, 'destroy'])->name('product_comment.delete');

    // Invoices management
    Route::resource('/admin/invoice/importinvoice', ImportInvoiceController::class);
    Route::resource('/admin/invoice/exportinvoice', ExportInvoiceController::class);
    Route::resource('/admin/invoice/onlineinvoice', OnlineInvoiceController::class);
    Route::get('/admin/invoice/onlineinvoice/finish/{id}', [OnlineInvoiceController::class, 'finish'])->name('onlineinvoice.finish');
    Route::get('/admin/invoice/onlineinvoice/cancel/{id}', [OnlineInvoiceController::class, 'cancel'])->name('onlineinvoice.cancel');

    // Account management
    Route::resource('/admin/customeraccount', CustomerAccountController::class);

    // Comment management
    Route::resource('/admin/comment', AdminCommentController::class);
});

// Guest
Route::get('/', [ShopController::class, 'showShop'])->name('shop.index');
Route::get('/customer/product', [ShopController::class, 'showProduct'])->name('product.index');
Route::get('/customer/product/{id}/detail', [ShopController::class, 'showProductDetail'])->name('product.detail');

// Customer 
Route::group(['middleware' => 'login_customer'], function() {
    // Cart
    Route::get('/customer/cart', [CartController::class, 'showCart'])->name('cart.index');
    Route::post('/customer/product/{id}/addcart', [CartController::class, 'addProductToCart'])->name('product.addcart');
    Route::post('/customer/deletecartitem', [CartController::class, 'deleteItemsInCart'])->name('product.deletecartitem');
    Route::post('/customer/deletecart', [CartController::class, 'deleteCart'])->name('product.deleteallcart');
    
    // Account
    Route::get('/customer/account', [CustomerLoginController::class, 'showAccountInfo'])->name('account.index');
    Route::post('/customer/changeinfo', [CustomerLoginController::class, 'changeAccountInfo'])->name('info.change');
    Route::post('/customer/changepassword', [CustomerLoginController::class, 'changePassword'])->name('password.change');
    
    // Invoice
    Route::get('/customer/invoice', [InvoiceController::class, 'showInvoice'])->name('invoice.index');
    Route::post('/customer/checkout', [InvoiceController::class, 'checkout'])->name('product.checkout');

    // Review
    Route::post('/customer/review/{product_id}', [CommentController::class, 'postReview'])->name('review.post');
    Route::post('/customer/comment/{product_id}', [CommentController::class, 'postComment'])->name('comment.post');
    Route::delete('/customer/comment/delete', [CommentController::class, 'deleteComment'])->name('comment.delete');
});

// API for chat realtime
Route::group(['middleware' => 'login_customer'] , function () {
   Route::get('/customer/getCurrentUser', [ChatCustomerAPI::class, 'getCurrentUser']);
   Route::get('/customer/chat/getMessages', [ChatCustomerAPI::class, 'getMessages']);
   Route::post('/customer/chat/postMessage', [ChatCustomerAPI::class, 'storeMessage']); 
});

Route::group(['middleware' => 'login_admin'] , function () {
    Route::get('/admin/chat/getAllUser', [ChatAdminAPI::class, 'getAllUser']);
    Route::get('/admin/chat/getMessages', [ChatAdminAPI::class, 'getMessages']);
    Route::post('/admin/chat/postMessage', [ChatAdminAPI::class, 'postMessage']);
 });
 