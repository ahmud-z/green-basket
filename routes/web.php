<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'home'])->name('home');

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart', [CartController::class, 'store'])->name('cart.store');

Route::get('/cart/add-item/{productId}', [CartController::class, 'addItem'])->name('cart.add-item');
Route::get('/cart/remove-item/{productId}', [CartController::class, 'removeItem'])->name('cart.remove-item');

Route::group(['middleware' => 'auth'], function () {
    Route::post('/{productId}/reviews', [ReviewController::class, 'store'])->name('reviews.store');

    Route::get('/checkout/shipping', [CheckoutController::class, 'shipping'])->name('checkout.shipping');
    Route::post('/checkout/shipping', [CheckoutController::class, 'saveShipping']);

    Route::get('/checkout/payment', [CheckoutController::class, 'payment'])->name('checkout.payment');
    Route::post('/checkout/payment', [CheckoutController::class, 'collectPaymentAndCreateOrder']);

    Route::get('/checkout/confirmation/{orderId}', [CheckoutController::class, 'confirmation'])->name('checkout.confirmation');
});

Route::group(['middleware' => 'guest'], function () {
    Route::get('/login', [LoginController::class, 'show'])->name('login');
    Route::post('/login', [LoginController::class, 'check']);

    Route::get('/register', [RegisterController::class, 'show'])->name('register');
    Route::post('/register', [RegisterController::class, 'save']);
});

Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
Route::get('/categories/{categoryId}', [CategoryController::class, 'show'])->name('categories.show');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{productId}', [ProductController::class, 'show'])->name('products.show');
