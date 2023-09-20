<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Auth\EmailVerificationRequest;

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
   Route::get('login', 'login');
   Route::get('logout', 'logout');
   Route::post('authenticate', 'authenticate')->name('authenticate');
});

Route::controller('ProductController')
    ->prefix('products')->name('products')->group(function (){
    Route::get('/', 'index')->name('.index');
    Route::get('/{product}/show', 'show')->name('.show');
});


//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
