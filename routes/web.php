<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;

// Public routes
Route::get('/', function () { return view('welcome'); })->name('welcome');
Route::get('/about', function () { return view('about'); })->name('about');
Route::get('/service', function () { return view('service'); })->name('service');
Route::get('/contact', function () { return view('contact'); })->name('contact');
Route::get('/about_page', [MainController::class, 'aboutpage'])->name('aboutpage');
Route::get('/registration_form', [UserController::class, 'registration_form'])->name('registration_form');
Route::post('/store_user', [UserController::class, 'store_user'])->name('store_user');
Route::get('/login', [UserController::class, 'login'])->name('login');
Route::post('/login_user', [UserController::class, 'login_user'])->name('login_user');


// Protected routes
Route::middleware('auth')->group(function () {
    Route::get('/home_page', [ProductController::class, 'homepage'])->name('homepage');
    Route::post('add_to_cart/{id}', [ProductController::class, 'add_to_cart'])->name('add_to_cart');
    Route::get('/user_cart', [ProductController::class, 'user_cart'])->name('user_cart');
    Route::post('/update_cart_quantity/{id}', [ProductController::class, 'update_cart_quantity'])->name('update_cart_quantity');
    Route::get('/service_page', [MainController::class, 'servicepage'])->name('servicepage');
    Route::get('product_form', [ProductController::class, 'product_form'])->name('product_form');
    Route::post('/inka', [ProductController::class, 'store_product'])->name('register');
    Route::get('/all_products', [ProductController::class, 'all_products'])->name('all_products');
    Route::get('/delete_product/{product_id}', [ProductController::class, 'delete_product'])->name('delete_product');
    Route::get('/edit_product/{id}', [ProductController::class, 'edit_product'])->name('edit_product');
    Route::post('/update_product/{id}', [ProductController::class, 'update_product'])->name('update_product');
    Route::post('/sell_product/{id}', [ProductController::class, 'sell_product'])->name('sell_product');
    Route::post('/purchase_product/{id}', [ProductController::class, 'purchase_product'])->name('purchase_product');
    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
    Route::get('/admin_registration_form', [UserController::class, 'admin_registration_form'])->name('admin_registration_form');
    Route::post('/store_admin', [UserController::class, 'store_admin'])->name('store_admin');
    Route::get('/admin_purchases', [ProductController::class, 'admin_purchases'])->name('admin_purchases');
    Route::get('/customer_purchases', [ProductController::class, 'customer_purchases'])->name('customer_purchases');
    Route::post('/checkout_cart', [ProductController::class, 'checkout_cart'])->name('checkout_cart');
    
});