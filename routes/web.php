<?php

use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\CategoryController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\CompareController;
use App\Http\Controllers\Frontend\PagesController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\SubscriberController;
use App\Http\Controllers\Frontend\WelcomeController;
use App\Http\Controllers\Frontend\WishlistController;
use Illuminate\Support\Facades\Route;

// Frontend Welcome Route
Route::get('/', [WelcomeController::class, 'index']);

// common pages route
Route::get('/about-us', [PagesController::class, 'aboutUs'])->name('about.us');
Route::get('/trems-condition', [PagesController::class, 'tremsCondition'])->name('trems.condition');
Route::get('/privacy-policy', [PagesController::class, 'privacyPolicy'])->name('privacy.policy');
Route::get('/contact-us', [PagesController::class, 'contactUs'])->name('contact.us');
Route::post('/contact-us', [PagesController::class, 'storeContact'])->name('contact.store');
Route::get('/faq', [PagesController::class, 'faq'])->name('faq');
Route::get('/categories', [CategoryController::class, 'index'])->name('category.all');

Route::get('/product/{slug}', [ProductController::class, 'productDetails'])->name('product.details');
Route::get('/category/{slug}', [ProductController::class, 'productsByCategory'])->name('products.bycategory');

// product routes
Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::resource('products', ProductController::class);
Route::resource('compares', CompareController::class);
Route::resource('wishlists', WishlistController::class);
Route::resource('carts', CartController::class);
Route::resource('checkouts', CheckoutController::class);
Route::resource('subscribers', SubscriberController::class);

// testimonial routes
Route::resource('testimonials', TestimonialController::class);

Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/cart/remove', [CartController::class, 'removeCart'])->name('cart.remove');

Route::post('/cart/increase', [CartController::class, 'increaseQuantity'])->name('cart.increase');
Route::post('/cart/decrease', [CartController::class, 'decreaseQuantity'])->name('cart.decrease');


