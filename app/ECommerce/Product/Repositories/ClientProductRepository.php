<?php


namespace App\ECommerce\Product\Repositories;


use App\ECommerce\Product\Models\Product;
use App\ECommerce\Product\RepositoryInterfaces\ClientProductInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ClientProductRepository implements ClientProductInterface
{
    /*
     * Dealing with products main page + filtering.
     */
    public function index(Request $request)
    {
        // Filter with search keyword if found.
        if ($needle = $request->q)
            return Product::where('name', 'Like',"%$needle%")->get();

        // Filter with category name if found.
        if ($category = $request->category)
            return Product::with('category')->whereRaw('category_id = ' . $category)->paginate(9);

        //TODO: Get products from cache, if not store then, return them.
//        return Cache::remember('data', now()->addDay(), function (){
            return Product::paginate(9);
//        });
    }

    /*
     * Show one product resource.
     */
    public function show(Product $product) : ?Product
    {
        return $product;
    }

}
