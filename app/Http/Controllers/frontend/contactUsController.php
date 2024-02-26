<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Mail\contactUs;
use App\Models\Settings;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class contactUsController extends Controller
{
    public function index()
    {
        $settings = Settings::first();
        return view('website.pages.contactus.index', compact('settings'));
    }

    public function sendEmail(Request $request)
    {
        $validation = $request->validate([
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string'
        ]);


        $details = [
            'subject' => $request->subject,
            'email' => $request->email,
            'message' => $request->message,
        ];
        $email = Settings::first()->email;
        if ($email) {
            Mail::to('your_receiver_email@gmail.com')->send(new contactUs($details));
            return redirect()->route('contact_us.index')->with('success', 'The email have been sended');
        }
        return redirect()->route('contact_us.index')->with('error', 'something went wrong try again');
    }
}
