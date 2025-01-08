<?php

use App\ECommerce\Product\Models\Product;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Redis;

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

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('hi', function() {
     // Define a cache key
     $cacheKey = 'products_list';

     // Check if the cache exists
     $products = Cache::remember($cacheKey, now()->addMinutes(10), function () {
         // If not cached, retrieve from database
         return Product::all();
     });
 
     return response()->json([
        "products" => $products,
    ], 200);
});

/**
 * 
 * Rate Limiting and Caching Together 
 * If you're caching product data and using rate limiting (e.g., for product search), 
 * you can combine the two to throttle cache access and ensure that data is only cached after a certain number of requests. 
 * Laravel supports rate limiting out of the box, and Redis is a great tool for this.
 * 
 * Monitoring and Debugging Redis Caching When you start using Redis for caching, you want to monitor and debug its performance. 
 * Laravel provides tools such as Laravel Telescope to debug Redis and cache usage. 
 * Install Laravel Telescope: composer require laravel/telescope 
 * Use it to monitor cache hits, misses, and other Redis interactions.
 * 
 * use Illuminate\Support\Facades\Cache;
 * use Illuminate\Cache\RateLimiter;

 * public function search(Request $request)
 * {
 * $limiter = app(RateLimiter::class);
 *  $key = 'search_' . $request->ip();
 *     if ($limiter->tooManyAttempts($key, 10)) {
 *         return response('Too many requests', 429);
 *     }
 *     $limiter->hit($key);
 *  $cacheKey = "search_results_" . md5($request->query('q'));
 *     $results = Cache::remember($cacheKey, now()->addMinutes(10), function () use ($request) {   
 *      return Product::search($request->query('q'))->get();
 *     });    
 * return view('products.search', compact('results'));
 * }

 * 
 * 
 * 
 * 
 */