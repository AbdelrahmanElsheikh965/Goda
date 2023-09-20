<?php

namespace App\ECommerce\Product\RepositoryInterfaces;

use App\ECommerce\Product\Models\Product;
use Illuminate\Http\Request;

interface UserProductInterface
{
    // Actual dealing (read/write) with database methods signatures.
    public function index();
    public function store(array $data, array|null $slidesNames);
    public function update(Product $product, array $data);
    public function destroy(Product $product);
}
