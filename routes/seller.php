<?php

use App\Http\Controllers\seller\indexController;
use App\Http\Controllers\seller\SellerOrderController;
use App\Http\Controllers\seller\SellerProductController;
use App\Http\Controllers\seller\SellerProfileController;
use Illuminate\Support\Facades\Route;



// ----------------------------------- Seller Dashboard  -----------------------------------------------------



Route::prefix('seller')->middleware(['auth', 'seller'])->group(function () {
     // View Dashboard Seller
     Route::get('/', [indexController::class, 'index'])->name('seller.dashboard');
     // Product
     Route::resource('/seller_products', SellerProductController::class);
     // get children cats
     Route::get('/get_cat_children/{id}', [SellerProductController::class, 'getCatChildren']);
     // Orders 
     Route::get('seller_orders', [SellerOrderController::class, 'index'])->name('seller_orders.index');
     // update order status 
     Route::post('/orders/update_order_status/{id}', [SellerOrderController::class, 'updateOrderStatus'])->name('update.orderStatus');
     // Move orders To Trash 
     Route::delete('orders/delete/{id}', [SellerOrderController::class, 'OrderToTrash'])->name('order.toTrash');
     // Order Details 
     Route::get('seller_order_details/{order_number}', [SellerOrderController::class, 'orderDetails'])->name('seller_order.details');
     // Profile 
     Route::get('seller_profile', [SellerProfileController::class, 'index'])->name('seller_profile.index');
     Route::put('seller_profile/update', [SellerProfileController::class, 'updateProfile'])->name('seller_profile.update');
});
