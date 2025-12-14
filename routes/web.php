<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\Frontend\CompareController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\WelcomeController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\WishlistController;
use App\Http\Controllers\Frontend\SubscribeController;




// Frontend Welcome Route
Route::get('/', [WelcomeController::class, 'index']);

//common pages route
Route::get('/about-us', [PagesController::class, 'aboutUs'])->name('about.us');
Route::get('/trems-condition', [PagesController::class, 'tremsCondition'])->name('trems.condition');
Route::get('/privacy-policy', [PagesController::class, 'privacyPolicy'])->name('privacy.policy');
Route::get('/contact-us', [PagesController::class, 'contactUs'])->name('contact.us');
Route::get('/faq', [PagesController::class, 'faq'])->name('faq');


//product routes

Route::get('/products', [ProductController::class, 'index'])->name('product.index');
// Route::get('/product/{slug}', [ProductController::class, 'show']);

Route::get('/cart', [CartController::class, 'index'])->name('cart.index');;
Route::get('/cart/add/{id}', [CartController::class, 'add']);

Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');;
Route::post('/checkout', [CheckoutController::class, 'placeOrder']);

Route::post('/subscribe', [SubscribeController::class, 'store'])->name('store');;

Route::get('/wishlist', [WishlistController::class, 'index'])->name('wishlist.index');;
Route::get('/wishlist/add/{id}', [WishlistController::class, 'add']);

Route::get('/compare', [CompareController::class, 'index'])->name('compare.index');;
Route::get('/compare/add/{id}', [CompareController::class, 'add']);