<?php


namespace App\ECommerce\Product\Repositories;

use App\ECommerce\Shared\Repositories\Repository;
use App\ECommerce\Product\Models\Product;

class ProductRepository extends Repository
{
    public function __construct(protected Product $product)
    {
        $this->setModel($product);
    }

}
