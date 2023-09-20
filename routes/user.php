<?php

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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


Route::group([
    'namespace'     => 'App\Http\Controllers\User',
    'prefix'        => 'user'
], function (){

    Route::get('/', 'UserController@index');

    Route::group([
        'prefix'        => 'products'
    ], function (){
        Route::get('/', 'UserProductController@index');
        Route::get('/create', 'UserProductController@create');
        Route::post('/load', 'UserProductController@load');
        Route::post('/store', 'UserProductController@store');

        Route::get('/edit/{product}', 'UserProductController@edit')->name('products.edit');
        Route::post('/update/{product}', 'UserProductController@update')->name('products.update');

        Route::delete('/destroy/{product}', 'UserProductController@destroy')->name('products.destroy');

    });

});
