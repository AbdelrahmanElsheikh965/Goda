<?php

namespace App\ECommerce\Static\Services;

use App\ECommerce\Shared\Helpers\Helper;
use App\ECommerce\Static\Repositories\WebImageRepository;
use Illuminate\Http\Request;

class WebImageService
{
    public function __construct(protected WebImageRepository $webImageRepository) {}

    public function index()
    {
        return $this->webImageRepository->index('Admin.WebImages.index');
    }

    public function update(Request $request)
    {
        $request->validate([ 'image.*' => 'image|mimes:jpg,png,jpeg,svg,gif' ]);

        if (isset($request->files))
        {
            $uploadedImages = $request->files->all()["image"];
            $this->webImageRepository->update($uploadedImages);
        }
    }
}
