<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('Client.index');
});

Route::controller('ClientController')->group(function (){
   Route::get('register', 'register');
   Route::post('store', 'store')->name('store');
   Route::get('login', 'login');
    Route::post('authenticate', 'authenticate')->name('authenticate');
});

Route::controller('ProductController')
    ->prefix('products')->name('products')->group(function (){
    Route::get('/', 'index')->name('.index');
    Route::get('/{product}/show', 'show')->name('.show');
});

