<?php

namespace App\Http\Controllers\Web;

use App\ECommerce\Product\Services\ClientProductService;
use App\ECommerce\Product\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClientProductController extends Controller
{
    public function __construct(private ClientProductService $productService) {}

    public function index(Request $request)
    {
        $data = $this->productService->index($request); // products + categoriesWithSubCategories

        return view('Web.Products.products')->with('data', $data);
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
