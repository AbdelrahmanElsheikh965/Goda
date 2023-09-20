<?php

namespace App\Http\Controllers\User;

use App\ECommerce\User\Services\MainService;
use App\Http\Controllers\Controller;

class MainController extends Controller
{
    public function __construct(private MainService $service){ }

    public function index()
    {
        return $this->service->main('Admin.master');

    }
}
