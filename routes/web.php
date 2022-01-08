<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\categoryController;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

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

});