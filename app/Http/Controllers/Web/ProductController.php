<?php

namespace App\Http\Controllers\Web;

use App\ECommerce\Product\Services\ProductService;
use App\ECommerce\Product\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(private ProductService $productService) {}

    public function index(Request $request)
    {
        $products = $this->productService->index($request);
        return view('Web.Products.products')->with('products', $products);
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        $product = $this->productService->show($product);
        return view('Web.Products.product')->with('product', $product);
    }

}
