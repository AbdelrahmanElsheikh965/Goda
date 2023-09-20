<?php

namespace App\Http\Controllers\Web;

use App\ECommerce\Product\Services\ClientProductService;
use App\ECommerce\Product\Models\Product;
use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ClientProductController extends Controller
{
    public function __construct(private ClientProductService $productService) {}

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
