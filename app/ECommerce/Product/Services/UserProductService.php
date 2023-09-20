<?php


namespace App\ECommerce\Product\Services;

use App\ECommerce\Product\Repositories\UserProductRepository;
use App\ECommerce\Product\Models\Product;
use Illuminate\Http\Request;
use App\ECommerce\Shared\Helpers\Helper;

class UserProductService
{
    public function __construct(protected UserProductRepository $repository) {}

    public function index()
    {
        return view('Admin.Products.index',['products'=> $this->repository->index()]);
    }

    public function create()
    {
        return view('Admin.Products.createForm');
    }

    public function store(Request $request)
    {
        $rules = [
            'name'              => 'required',      'sub_category_id'   => 'required',
            'cover_image'       => 'required',      'price'             => 'required',
            'image_1'           => 'nullable',      'image_2'           => 'nullable',
            'image_3'           => 'nullable',      'discount'          => 'nullable',
            'description'       => 'nullable',
        ];

        $request->validate($rules);
        Helper::save($request->file('cover_image'));

        if ($images = $request->file('images'))
        {
            $this->repository->store(data: $request->except('_token', 'images'), images: $images);
        }else
        {
            $this->repository->store(data: $request->except('_token'), images: null);
        }
    }

    public function edit(Product $product)
    {
        return view('Admin.Products.updateForm', compact('product'));
    }

    public function update(Request $request, Product $product)
    {
        // Validation and preparing data before being stored in database.
        $rules = [
            'name'              => 'required',      'sub_category_id'   => 'required',
            'cover_image'       => 'nullable',      'price'             => 'required',
            'image_1'           => 'nullable',      'image_2'           => 'nullable',
            'image_3'           => 'nullable',      'discount'          => 'nullable',
            'description'       => 'nullable',
        ];
        $request->validate($rules);
        $this->repository->update(product: $product, data: [
            'data'              => $request->except('_token'),
            'images'            => $request->file('images'),
            'cover_image'       => $request->file('cover_image')
        ]);

    }

    public function destroy(Product $product)
    {
        $this->repository->destroy(product: $product);
    }
}
