<?php


namespace App\ECommerce\Static\Repositories;

use App\ECommerce\Shared\Helpers\Helper;
use App\ECommerce\Shared\Repositories\StaticRepository;
use App\ECommerce\Static\Models\WebImage;

class WebImageRepository extends StaticRepository
{
    public function __construct(protected WebImage $webImage)
    {
        $this->setModel($webImage);
    }

    public function index(string $viewName)
    {
        $webImages = WebImage::pluck('id');
        return view($viewName, ['webImages' => $webImages]);
    }

    public function update(array $data, $ids = null)
    {
        foreach ($data as $key => $value)
        {
            Helper::save($value, 'app/public/AdminImages');
            $this->getModel()::find($key)->update([
                    'image' => $value->getClientOriginalName()
                ]);
        }
    }
}
