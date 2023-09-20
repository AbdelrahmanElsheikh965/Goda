<?php


namespace App\ECommerce\Client\Services;

use App\ECommerce\Client\Events\AccountCreatedEvent;
use App\ECommerce\Client\Models\Client;
use App\ECommerce\Client\Requests\LoginRequest;
use App\ECommerce\Client\Requests\RegisterRequest;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class ClientAuthService
{

    public function register()
    {
        return view('Web.Auth.register');
    }

    public function store(RegisterRequest $request)
    {
        $client = Client::create($request->validated());
        $client->setPasswordAttribute($request->password);
        event(new AccountCreatedEvent($client));
    }

    public function login()
    {
        return view('Web.Auth.login');
    }

    public function authenticate(LoginRequest $request)
    {
        $credentials = [
            'email'     => request()->input('email'),
            'password'  => request()->input('password')
        ];

        if (auth()->attempt($credentials)) {

            // Handle successful login
            if (request()->filled('rememberMe')){
                $token = hash('sha256', Str::random(10));
                auth()->user()->update(['remember_token' => $token]);
                Cookie::queue('remember_token', $token, 2880);   // Save the cookie for 2 days. 60*24*2
            }
            Auth::login($request->user());  // It will last for 2 hours as SESSION_LIFETIME
            return redirect(url('/'));
        }else{
            return redirect()->back()->with('error' , 'Sorry invalid data');
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect(url('/'));
    }
}
