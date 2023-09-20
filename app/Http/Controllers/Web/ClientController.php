<?php

namespace App\Http\Controllers\Web;

use App\ECommerce\Client\Models\Client;
use App\ECommerce\Client\Requests\RegisterRequest;
use App\ECommerce\Client\Services\ClientAuthService;
use App\ECommerce\Product\Models\Product;
use App\ECommerce\Shared\Requests\LoginRequest;
use App\ECommerce\Static\Models\Paragraph;
use App\ECommerce\Static\Models\WebImage;
use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\SubCategory;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ClientController extends Controller
{

    public function __construct(private ClientAuthService $clientAuthService) {}

    public function index()
    {
        $webImages = WebImage::all();
        $webParagraphs = Paragraph::all();
        $contactDetails = ContactUs::first();
        $subCategories = SubCategory::take(6)->get();
        $latestProducts = Product::latest('created_at')->take(4)->get();

        return view('Web.index', [
            'webImages'      => $webImages,
            'webParagraphs'  => $webParagraphs,
            'contactDetails' => $contactDetails,
            'subCategories'  => $subCategories,
            'latestProducts'  => $latestProducts
        ]);
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

    public function verify($email)
    {
        Client::where('email', $email)->first()
            ->update(['email_verified_at' => Carbon::now('GMT+3')->toDateTimeString()]);
        return redirect('/');
    }


    public function login()
    {
        return $this->clientAuthService->login();
    }

    public function authenticate(LoginRequest $request)
    {
        return $this->clientAuthService->authenticate($request);
    }


    public function forgotPassword()
    {
        return $this->clientAuthService->forgotPassword();
    }

    public function resetPassword(Request $request)
    {
        return $this->clientAuthService->resetPassword($request);
    }

    public function updatePassword(Request $request)
    {
        return $this->clientAuthService->updatePassword($request);
    }

    public function emailViewForm($email)
    {
        return $this->clientAuthService->emailViewForm($email);
    }


    public function logout()
    {
        return $this->clientAuthService->logout();
    }


    public function profile()
    {
        return view('Web.profile');
    }

}
