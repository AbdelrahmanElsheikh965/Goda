<?php

namespace App\Http\Controllers\User;

use App\ECommerce\Product\Models\Product;
use App\ECommerce\Product\Services\UserProductService;
use App\ECommerce\Shared\Helpers\Helper;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function __construct(private UserProductService $service) { }

    public function index()
    {
        return $this->service->index();
    }

    public function create()
    {
        return $this->service->create();
    }

    public function store(Request $request)
    {
        $this->service->store($request);
        return redirect('user/products/create');
    }

    public function edit(Product $product)
    {
        return $this->service->edit($product);
    }

    public function update(Request $request, Product $product)
    {
        $this->service->update($request, $product);
        return redirect('user/products');
    }

    public function destroy(Product $product)
    {
        $this->service->destroy($product);
        return redirect('user/products');
    }

    public function load()
    {
        if (isset($_POST['categoryId']))
        {
            Helper::load(table: 'sub_categories', columns: ['name as sname', 'id'], idColumn: 'category_id',id: $_POST['categoryId'], count: true);
        }
        elseif (isset($_POST['productId']))
        {
            Helper::load(table: 'products', columns: ['size'], idColumn: 'id',id: $_POST['productId'], count: false);
        }
    }

}
