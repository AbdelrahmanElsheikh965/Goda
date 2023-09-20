<?php

use Illuminate\Support\Facades\Route;


Route::group([
    'namespace'     => 'App\Http\Controllers\Lists',
    'middleware'    => 'auth'
], function (){

    Route::get('/cart', 'CartController@cart');
    Route::post('/add-to-cart', 'CartController@addToCart');
    Route::post('/remove-from-cart', 'CartController@removeFromCart');

    Route::get('/wishlist', 'WishlistController@wishlist');
    Route::get('/add-to-wishlist', 'WishlistController@addToWishlist');
    Route::get('/remove-from-wishlist', 'WishlistController@removeFromWishlist');

});
