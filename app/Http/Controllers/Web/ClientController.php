<?php

namespace App\Http\Controllers\Web;

use App\ECommerce\Client\Models\Client;
use App\ECommerce\Client\Requests\LoginRequest;
use App\ECommerce\Client\Requests\RegisterRequest;
use App\ECommerce\Client\Services\ClientAuthService;
use App\Http\Controllers\Controller;
use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redis;

class ClientController extends Controller
{

    public function __construct(private ClientAuthService $clientAuthService) {}

    public function index()
    {
        if (Cache::has('index_blade')){
            return Cache::get('index_blade');
        }else{
            $index =  view('Web.index')->render();
            Cache::set('index_blade', $index);
            return $index;
        }
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

    public function cart()
    {
        return view('Web.Lists.cart');
    }

    public function wishlist()
    {
        return view('Web.Lists.wishlist');
    }

}
