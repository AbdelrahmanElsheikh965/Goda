<?php

namespace App\ECommerce\Product\RepositoryInterfaces;

use App\ECommerce\Product\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

interface ClientProductInterface
{
    public function index(Request $request);
    public function show(Product $model) : ?Product;
}
