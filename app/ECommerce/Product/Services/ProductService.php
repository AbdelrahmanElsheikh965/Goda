<?php


namespace App\ECommerce\Product\Services;

use App\ECommerce\Product\Repositories\ProductRepository;
use App\ECommerce\Product\Models\Product;
use Illuminate\Http\Request;

class ProductService
{
    public function __construct(protected ProductRepository $repository) {}

    public function index(Request $request)
    {
        return $this->repository->index($request);
    }

    public function show(Product $product)
    {
        return $this->repository->show($product);
    }
}
