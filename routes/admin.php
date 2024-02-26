<?php

use App\Http\Controllers\dashboard\aboutController;
use App\Http\Controllers\dashboard\AdminController;
use App\Http\Controllers\dashboard\bannerController;
use App\Http\Controllers\dashboard\BrandController;
use App\Http\Controllers\dashboard\CategoryController;
use App\Http\Controllers\dashboard\CurrencyController;
use App\Http\Controllers\dashboard\OrderController;
use App\Http\Controllers\dashboard\ProductController;
use App\Http\Controllers\dashboard\profileController;
use App\Http\Controllers\dashboard\SettingsController;
use App\Http\Controllers\dashboard\teamController;
use App\Http\Controllers\dashboard\UserController;
use App\Http\Controllers\dashboard\VendorController;
use Illuminate\Support\Facades\Route;






// --------------------------- Backend End ------------------------------------------------------------
// Route for Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
     // Dashboard
     Route::get('/', [AdminController::class, 'admin'])->name('admin');
     // Banners
     Route::resource('banner', bannerController::class);
     // Category
     Route::resource('category', CategoryController::class);
     // Brand
     Route::resource('brand', BrandController::class);
     // Product
     Route::resource('product', ProductController::class);
     Route::get('/get_cat_children/{id}', [ProductController::class, 'getCatChildren']);

     // Orders 
     Route::get('orders', [OrderController::class, 'index'])->name('order.index');
     // Update Order Status
     Route::post('update_orderStatus/{id}', [OrderController::class, 'updateOrderStatus'])->name('update.status');
     // Order Details 
     Route::get('order_details/{order_number}', [OrderController::class, 'orderDetails'])->name('order.details');
     // Move orders To Trash 
     Route::delete('orders_delete/{id}', [OrderController::class, 'OrderToTrash'])->name('order.delete');

     // Users 
     Route::resource('user', UserController::class);
     // Vendors
     Route::resource('vendor', VendorController::class);

     // Currency
     Route::resource('currency', CurrencyController::class);

     // About 
     Route::resource('about', aboutController::class);
     // Team 
     Route::resource('team', teamController::class);
     // Profile 
     Route::get('profile', [profileController::class, 'index'])->name('profile.index');
     Route::put('profile/update', [profileController::class, 'updateProfile'])->name('profile.update');
     // Settings 
     Route::resource('settings', SettingsController::class);
});
require __DIR__ . '/auth.php';
