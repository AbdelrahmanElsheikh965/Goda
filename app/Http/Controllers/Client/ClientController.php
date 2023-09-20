<?php

namespace App\Http\Controllers\Client;

use App\ECommerce\Client\Requests\LoginRequest;
use App\ECommerce\Client\Requests\RegisterRequest;
use App\ECommerce\Client\Services\ClientAuthService;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Log;

class ClientController extends Controller
{
    public function __construct(private ClientAuthService $clientAuthService) {}

    public function register()
    {
        return $this->clientAuthService->register();
    }

    public function store(RegisterRequest $request)
    {
        $this->clientAuthService->store($request);
        return redirect(url('/'));
    }

    public function login()
    {
        return $this->clientAuthService->login();
    }

    public function authenticate(LoginRequest $request)
    {
        return $this->clientAuthService->authenticate($request);
    }
}
