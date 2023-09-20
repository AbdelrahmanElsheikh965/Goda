<?php

namespace App\Http\Controllers\Web;

use App\ECommerce\Client\Models\Client;
use App\ECommerce\Client\Requests\LoginRequest;
use App\ECommerce\Client\Requests\RegisterRequest;
use App\ECommerce\Client\Services\ClientAuthService;
use App\ECommerce\Static\Models\WebImage;
use App\Http\Controllers\Controller;
use Carbon\Carbon;

class ClientController extends Controller
{

    public function __construct(private ClientAuthService $clientAuthService) {}

    public function index()
    {
        $webImages = WebImage::all();
        return view('Web.index', ['webImages' => $webImages]);
    }
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

    public function logout()
    {
        return $this->clientAuthService->logout();
    }

    public function authenticate(LoginRequest $request)
    {
        return $this->clientAuthService->authenticate($request);
    }

    public function verify($email)
    {
        Client::where('email', $email)->first()
            ->update(['email_verified_at' => Carbon::now('GMT+3')->toDateTimeString()]);
        return redirect('/');
    }

    public function profile()
    {
        return view('Web.profile');
    }

}
