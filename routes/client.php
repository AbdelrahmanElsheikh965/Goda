<?php

use Illuminate\Support\Facades\Route;


Route::group([
    'namespace'     => 'App\Http\Controllers\Web',
    'controller'    => 'ClientController',
], function (){

    Route::get('/', 'index');
    Route::get('/profile', 'profile');

    Route::get('/register', 'register');
    Route::post('/store', 'store')->name('store');
    Route::get('/verify/{email}', 'verify');

    Route::get('/login', 'login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');

    // TODO: Forgot password route + functionality.
    Route::get('/logout', 'logout');

});

Route::group([
    'namespace'     => 'App\Http\Controllers\Web',
    'controller'    => 'ClientProductController',
], function (){

    // TODO: Make filtering and searching done using XHRs.
    Route::get('products/{category?}', 'index')->name('products.index');
    Route::get('products/{product}/show', 'show')->name('products.show');

});

Route::get('contact-us', function (){
    return view('Web.Static.contact-us');
});

