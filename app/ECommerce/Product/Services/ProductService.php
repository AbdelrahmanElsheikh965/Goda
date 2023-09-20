<?php


namespace App\ECommerce\Product\Services;

use App\ECommerce\Product\Repositories\ProductRepository;
use App\ECommerce\Product\Models\Product;

class ProductService
{
    public function __construct(protected ProductRepository $repository) {}

    public function index()
    {
        return $this->repository->index();
    }

    public function show(Product $product)
    {
        return $this->repository->show($product);
    }
}
