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
        $products =  Product::with('subCategory')->paginate(9);

        // Preparing Categories sidebar with subcategories + counts.
        $categories = [];
        $subCategories = [];
        $subCategoriesCount = [];
        foreach ($products as $product)
        {
            if (! in_array($product->subCategory->name, $subCategories)){
                $categories[$product->subCategory->category->name][$product->subCategory->id] = $product->subCategory->name;
                $subCategories[] = $product->subCategory->name;
                $subCategoriesCount[$product->subCategory->name] = 1;
            }
            else{
                $subCategoriesCount[$product->subCategory->name]++;
            }
        }

        // Filter with search keyword if found.
        if ($needle = $request->q) {
            $products = Product::where('name', 'Like', "%$needle%")->get();
            return [$products, $categories, $subCategoriesCount];
        }

        // Filter with sub-category name if found.
        if ($sub_category = $request->subCategory) {
            $products = Product::with('subCategory')->whereRaw('sub_category_id = ' . $sub_category)->paginate(9);
            return [$products, $categories, $subCategoriesCount];
        }

        return [$products, $categories, $subCategoriesCount];

    }

    /*
     * Show one product resource.
     */
    public function show(Product $product) : ?Product
    {
        return $product;
    }

}
