<?php

namespace App\Http\Controllers\User;

use App\ECommerce\Static\Services\WebImageService;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class WebImageController extends Controller
{
    public function __construct(private WebImageService $webImageService) {}

    public function index()
    {
        return $this->webImageService->index();
    }

    public function update(Request $request)
    {
        $this->webImageService->update($request);
        return redirect('user/web-images');
    }
}
