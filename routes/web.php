<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\productController;
use App\Http\Controllers\Frontend\cartController;
use App\Http\Controllers\Frontend\userController;
use App\Http\Controllers\Admin\categoryController;
use App\Http\Controllers\Frontend\checkoutController;
use App\Http\Controllers\frontend\frontendController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [frontendController::class, 'frontIndex']);
Route::get('/category', [frontendController::class, 'category']);
Route::get('/category/{slug}', [frontendController::class, 'viewCategory']);
Route::get('/category/{c_slug}/{p_slug}', [frontendController::class, 'productView']);

Auth::routes();

Route::post('/add-to-cart', [cartController::class, 'addToCart']);

Route::middleware(['auth'])->group(function() {
    Route::get('/cart', [cartController::class, 'viewCart']);
    Route::post('/delete-cart-item', [cartController::class, 'deleteCartItem']);
    Route::post('/update-cart', [cartController::class, 'updateCart']);
    Route::get('/checkout', [checkoutController::class, 'index']);
    Route::post('/place-order', [checkoutController::class, 'placeOrder']);

    Route::get('/my-order', [userController::class, 'index']);
    Route::get('/view-order/{id}', [userController::class, 'view']);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth', 'isAdmin'])->group(function () {
    Route::get('/dashboard', 'Admin\frontendController@index');
    
    Route::get('/categories', 'Admin\categoryController@index');
    Route::get('/add-category', 'Admin\categoryController@add');
    Route::post('/add-category', 'Admin\categoryController@insert');

    Route::get('/edit-category/{id}', 'Admin\categoryController@edit');
    //Route::get('/edit-category/{id}', [categoryController::class, 'edit']);
    //Route::put('/update-category/{id}', [categoryController::class, 'update']);
    Route::put('/update-category/{id}', 'Admin\categoryController@update');
    Route::get('/delete-category/{id}', 'Admin\categoryController@delete');

    Route::get('/products', [productController::class, 'index']);
    Route::get('/add-product', [productController::class, 'add']);
    Route::post('/add-product', [productController::class, 'insert']);

    Route::get('/edit-product/{id}', [productController::class, 'edit']);
    Route::put('/update-product/{id}', [productController::class, 'update']);
    Route::get('/delete-product/{id}', [productController::class, 'delete']);
});