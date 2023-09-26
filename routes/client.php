<?php

use Illuminate\Support\Facades\Route;

Route::group([
    'namespace'     => 'App\Http\Controllers\Web',
    'controller'    => 'ClientController',
], function (){

    Route::get('/', 'index');

    Route::get('/register', 'register');
    Route::post('/store', 'store')->name('store');
    Route::get('/verify/{email}', 'verify');

    Route::get('/login', 'login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');

    Route::get('/forgot-password', 'forgotPassword')->name('forgot-password');
    Route::post('/reset-password/{update?}', 'resetPassword')->name('reset-password');
    Route::get('/update-password-view/{email}', 'emailViewForm')->name('update-password-view');
    Route::post('/update-password', 'updatePassword')->name('update-password');

    Route::get('/logout', 'logout');
});

Route::group([
    'namespace'     => 'App\Http\Controllers\Web',
    'controller'    => 'ClientProductController',
], function (){

    Route::get('products/{subCategory?}', 'index')->name('products.index');
    Route::get('products/{product}/show', 'show')->name('products.show');

});

Route::get('contact-us', function (){
    return view('Web.Static.contact-us');
});

Route::get('about-us', function () {
    return view('Web.Static.about-us');
});
