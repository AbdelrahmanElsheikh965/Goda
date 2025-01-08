<?php


namespace App\ECommerce\Product\Repositories;


use App\ECommerce\Product\Models\Product;
use App\ECommerce\Product\RepositoryInterfaces\UserProductInterface;
use App\ECommerce\Shared\Helpers\Helper;

class UserProductRepository implements UserProductInterface
{
    public function index()
    {
        return Product::paginate(6);
    }

    public function store(array $data, ?array $images)
    {
        // TODO: Create a scheduled job that checks and deletes all images of deleted products every day.
        $data['size']           = explode(",", $data['size']);
        $data['cover_image']    = $data['cover_image']->getClientOriginalName();
        $product                = Product::create($data);
        ($product) ? session()->put('message', "Done") : session()->put('message', "Error");

        if ($images)
        {
            $helper = Helper::getInstance();
            $helper->getSlidesNames($images)->handleSlidesImagesWithDB($product);
        }
    }

    public function update(Product $product, array $data)
    {
        $handled = false;
        ($data['cover_image']) ? Helper::save($data['cover_image']) : '';
        $updated = $product->update([
            "name"              => $data['data']['name'],
            "description"       => $data['data']['description'],
            "cover_image"       => ($data['cover_image']?->getClientOriginalName()) ?? $product->cover_image,
            "price"             => $data['data']['price'],
            "discount"          => $data['data']['discount'],
            "size"              => explode(",", $data['data']['size']) ,
            "sub_category_id"   => (int) $data['data']['sub_category_id']
        ]);

        if (isset($data['images']))
        {
            $helper  = Helper::getInstance();
            $handled = $helper->getSlidesNames($data['images'])->handleSlidesImagesWithDB($product);
        }
        ($updated || $handled) ? session()->put('message', "Updated") : session()->put('message', "Error while updating");

    }

    public function destroy(Product $product)
    {
        ($product->delete()) ? session()->put('message', "Deleted") : session()->put('message', "Error while deleting");
    }
}
