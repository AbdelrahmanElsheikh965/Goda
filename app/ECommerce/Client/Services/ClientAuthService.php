<?php


namespace App\ECommerce\Client\Services;

use App\ECommerce\Client\Emails\ResetPasswordEmail;
use App\ECommerce\Client\Events\AccountCreatedEvent;
use App\ECommerce\Client\Models\Client;
use App\ECommerce\Client\Requests\LoginRequest;
use App\ECommerce\Client\Requests\RegisterRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
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

    public function forgotPassword()
    {
        return view('Web.Auth.forgot-password');
    }

    public function resetPassword(Request $request)
    {
        $token = Str::random(60);
        Mail::to($request->email)->send(new ResetPasswordEmail($request->email, $token));
        DB::table('password_reset_tokens')->updateOrInsert(
            ['email' => $request->email],
            [
                'token' => $token,
                'created_at' => Carbon::now('GMT+3')->toDateTimeString(),
                'expires_at' => Carbon::now('GMT+3')->addMinutes(5)->toDateTimeString() // 5 waiting for this process.
            ]
        );
        return redirect('/')->with('message', 'Mail sent .. Check your inbox');
    }

    public function emailViewForm($email)
    {
        $passwordResetRow = DB::table('password_reset_tokens')
            ->select('expires_at')
            ->where('email', '=', base64_decode($email))->first()->expires_at;

        if (Carbon::now('GMT+3')->toDateTimeString() < $passwordResetRow) {
            return view('Web.Auth.update-password');
        } else {
            return "Token expired try again " . " &nbsp; <a href='". url('/') ."'> Go Home </a>";
        }
    }
    public function updatePassword(Request $request)
    {
        $request->validate([
            'email'    => 'email:rfc,dns|exists:clients',
            'password' => 'required|confirmed|min:8'
        ]);
        $client = Client::where('email', $request->email)->first();

        $client->update([
            'password' => Hash::make($request->password)
        ]);

        return redirect('/')->with('message', 'Password updated successfully');
    }

    public function authenticate(LoginRequest $request)
    {
        $credentials = [
            'email' => request()->input('email'),
            'password' => request()->input('password')
        ];

        if (auth()->attempt($credentials)) {

            // Handle successful login
            if (request()->filled('rememberMe')) {
                $token = hash('sha256', Str::random(10));
                auth()->user()->update(['remember_token' => $token]);
                Cookie::queue('remember_token', $token, 2880);   // Save the cookie for 2 days. 60*24*2
            }
            Auth::login($request->user());  // It will last for 2 hours as SESSION_LIFETIME
            return redirect(url('/'));
        } else {
            return redirect()->back()->with('error', 'Sorry invalid data');
        }
    }

    public function logout()
    {
        auth()->logout();
        return redirect(url('/'));
    }
}
