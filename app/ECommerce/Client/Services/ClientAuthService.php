<?php


namespace App\ECommerce\Client\Services;

use App\ECommerce\Client\Models\Client;
use App\ECommerce\Client\Requests\LoginRequest;
use App\ECommerce\Client\Requests\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
    }

    public function login()
    {
        return view('Web.Auth.login');
    }

    public function authenticate(LoginRequest $request)
    {
        $client = Client::where('email', $request->email)->first();
        if($client){
            $password = Hash::check($request->password, $client->password);
            $password ? session()->put('client_id', $client->id) : '';
            return $password
                ? redirect(url('/'))
                : redirect()->back()->with('error' , 'Sorry invalid data');
        }
        return redirect()->back()->with('error' , 'Sorry invalid data');
    }
}
