<?php


namespace App\ECommerce\Product\Repositories;

use App\ECommerce\Product\Models\Product;
use App\ECommerce\Product\RepositoryInterfaces\ClientProductInterface;
use App\Models\SubCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class ClientProductRepository implements ClientProductInterface
{
    /*
     * Dealing with products main page + filtering.
     */
    public function index(Request $request)
    {
        $products =  Product::with('subCategory')->paginate(12);
        $subCategories = SubCategory::orderBy('category_id')->get();

        // Preparing Categories sidebar with subcategories + counts.
        $categories = [];
        foreach ($subCategories as $subCategory)
        {
            if (! in_array($subCategory->category->name, $categories)){
                $categories[$subCategory->category->name][$subCategory->id] = $subCategory->name;
            }
        }

        // Filter with search keyword if found.
        if ($needle = $request->q) {
            $products = Product::where('name', 'Like', "%$needle%")->get();
            return [$products, $categories];
        }

        // Filter with sub-category name if found.
        if ($sub_category = $request->subCategory) {
            $products = Product::with('subCategory')->whereRaw('sub_category_id = ' . $sub_category)->paginate(9);
            return [$products, $categories];
        }

        return [$products, $categories];
    }

    /*
     * Show one product resource.
     */
    public function show(Product $product) : ?Product
    {
        return $product;
    }

}
