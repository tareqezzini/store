<?php

use App\Http\Controllers\dashboard\CurrencyController;
use App\Http\Controllers\frontend\aboutController;
use App\Http\Controllers\frontend\checkoutController;
use App\Http\Controllers\frontend\contactUsController;
use App\Http\Controllers\frontend\costumerController;
use App\Http\Controllers\frontend\indexController;
use App\Http\Controllers\frontend\ProductRateController;
use App\Http\Controllers\frontend\searchProductController;
use App\Http\Controllers\frontend\shopController;
use App\Http\Controllers\frontend\wishlistController;
use Illuminate\Support\Facades\Route;

// ----------------------------------------- FrontEnd ---------------------------------------------------
// login and Register

// Route::get('/auth/login', [indexController::class, 'login'])->name('auth.login');


Route::get('/auth/register', [indexController::class, 'register'])->middleware('guest')->name('auth.register');
// Redirect to Home
Route::get('/', [indexController::class, 'index'])->name('home');

// get product related to Category :
Route::get('/product_category/{slug}', [indexController::class, 'getProductCat'])->name('product_category');
// get Product Details
Route::get('/product_details/{slug}', [indexController::class, 'productDetails'])->name('product.details');
//cart
Route::get('/cart', [wishlistController::class, 'showCart'])->name('cart.show');
// Wishlist
Route::get('/wishlist/index', [wishlistController::class, 'index'])->name('wishlist.index');
Route::delete('/wishlist/delete/{id}', [wishlistController::class, 'removeFromWishlist'])->name('wishlist.delete');
//checkout
Route::get('/checkout', [checkoutController::class, 'index'])->middleware('auth', 'costumer')->name('checkout.index');
// order
Route::post('checkout/addOrder', [checkoutController::class, 'addOrder'])->middleware('auth', 'costumer')->name('checkout.store');
// shop
Route::get('shop', [shopController::class, 'index'])->name('shop');
// Filter Shop
Route::post('shop-filter', [shopController::class, 'shopFilter'])->name('shop.filter');
// Rate Products
Route::post('product/rate/{id}', [ProductRateController::class, 'productRate'])->name('product.rate');
// change Currency
Route::post('changeCurrency', [CurrencyController::class, 'changeCurrency'])->name('change.currency');
//user account

// About Us 
Route::get('about_us', [aboutController::class, 'index'])->name('about_us.index');
// Contact Us
Route::get('contact_us', [contactUsController::class, 'index'])->name('contact_us.index');
// Send Email
Route::post('contact_us/sendEmail', [contactUsController::class, 'sendEmail'])->name('send.email');


Route::group(['prefix' => 'user', 'middleware' => ['auth', 'costumer']], function () {
    Route::get('/account_info', [costumerController::class, 'index'])->middleware('auth')->name('user.account');

    // update account info
    Route::put('/update_accountInfo/{id}', [costumerController::class, 'updateAccountInfo'])->name('update.accountInfo');

    // update address
    Route::put('/update_address/{id}', [costumerController::class, 'updateAddress'])->name('update.address');
    // update password
    Route::put('/update_password/{id}', [costumerController::class, 'updatePassword'])->name('update.password');
});








// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';
