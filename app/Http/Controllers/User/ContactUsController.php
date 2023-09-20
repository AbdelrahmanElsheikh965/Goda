<?php

namespace App\Http\Controllers\User;

use App\ECommerce\Static\Events\ContactUsDataChanged;
use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    private $contactInfo;

    public function __construct()
    {
        $this->contactInfo = ContactUs::first();
    }

    public function index()
    {
        return view('Admin.ContactUs.index')->with('data', $this->contactInfo);
    }

    public function update(Request $request)
    {
        $messages = ['fb_link.url' => 'Please type a real valid url address'];
        $request->validate(['fb_link' => 'url'], $messages);

        $this->contactInfo->update($request->all());
//        event(new ContactUsDataChanged($request->except('_token', '_method')));
        return redirect('user/contact-us');
    }

}
