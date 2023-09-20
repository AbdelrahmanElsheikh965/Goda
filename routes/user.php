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


Route::group([
    'namespace' => 'App\Http\Controllers\User',
    'prefix' => 'user'
], function () {

    Route::get('/', 'MainController@index');
    Route::get('/signin', 'MainController@signIn');
    Route::post('/authenticate', 'MainController@authenticate');
    Route::get('/signout', 'MainController@signOut');

    Route::group(['prefix' => 'products'], function () {
        Route::get('/', 'ProductController@index');
        Route::get('/create', 'ProductController@create');
        Route::post('/load', 'ProductController@load');
        Route::post('/store', 'ProductController@store');

        Route::get('/edit/{product}', 'ProductController@edit')->name('products.edit');
        Route::post('/update/{product}', 'ProductController@update')->name('products.update');

        Route::delete('/destroy/{product}', 'ProductController@destroy')->name('products.destroy');
    });

    # Categories
    Route::get('/categories', 'CategoryController@index');
    Route::get('/categories/create', 'CategoryController@create');
    Route::post('/categories/store', 'CategoryController@store');
    Route::get('/categories/edit/{category}', 'CategoryController@edit');
    Route::put('/categories/update/{category}', 'CategoryController@update');
    Route::delete('/categories/delete/{category}', 'CategoryController@delete');

    # Sub-categories
    Route::get('/sub-categories', 'SubCategoryController@index');
    Route::get('/sub-categories/create', 'SubCategoryController@create');
    Route::post('/sub-categories/store', 'SubCategoryController@store');
    Route::get('/sub-categories/edit/{subCategory}', 'SubCategoryController@edit');
    Route::put('/sub-categories/update/{subCategory}', 'SubCategoryController@update');
    Route::delete('/sub-categories/delete/{subCategory}', 'SubCategoryController@delete');

    # Contact-us 2 Routes
    Route::get('/contact-us', 'ContactUsController@index');
    Route::patch('/contact-us/update', 'ContactUsController@update')->name('contactUs.update');

    # Paragraphs 2 Routes
    Route::get('/paragraphs', 'ParagraphController@index');
    Route::patch('/paragraphs/update', 'ParagraphController@update')->name('paragraphs.update');

    # Web Images 2 Routes
    Route::get('/web-images', 'WebImageController@index');
    Route::patch('/web-images/update', 'WebImageController@update')->name('webImages.update');

});
