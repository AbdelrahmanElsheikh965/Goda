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


//Auth::routes(['verify' => true]);

Route::controller('ClientController')->group(function (){
   Route::get('/', 'index');
   Route::get('register', 'register');
   Route::post('store', 'store')->name('store');
   Route::get('/verify/{email}', 'verify');
   Route::get('login', 'login');
   Route::get('logout', 'logout');
   Route::post('authenticate', 'authenticate')->name('authenticate');

    Route::get('/cart', 'cart')->name('.cart');
    Route::get('/wishlist', 'wishlist')->name('.wishlist');
});

Route::controller('ProductController')
        ->prefix('products')->name('products')->group(function (){
    Route::get('/{category?}', 'index')->name('.index');
    Route::get('/{product}/show', 'show')->name('.show');

});


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
