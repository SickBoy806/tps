<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\RateLimiter;
use Exception;
use Illuminate\Support\Facades\Log;



class ContactController extends Controller
{
    public function submit(Request $request)
    {
        // Rate limiting: 3 attempts per minute
        if (RateLimiter::tooManyAttempts('contact-form:'.$request->ip(), 3)) {
            return back()->with('error', 'Too many attempts. Please try again in one minute.');
        }

        RateLimiter::hit('contact-form:'.$request->ip());

        // Validate the request
        $validated = $request->validate([
            'name' => 'required|min:2',
            'email' => 'required|email',
            'subject' => 'required|min:5',
            'message' => 'required|min:10'
        ]);

        try {
            // Queue email to admin
            Mail::to(config('mail.admin_address'))
                ->queue(new ContactFormMail($validated));

            // Queue confirmation email to user
            Mail::to($validated['email'])
                ->queue(new ContactFormMail(array_merge(
                    $validated,
                    ['confirmationToUser' => true]
                )));

            return back()->with('success', 'Thank you for your message. We\'ll get back to you soon!');
        } catch (Exception $e) {
            Log::error('Contact form email error: ' . $e->getMessage());
            return back()->with('error', 'Sorry, there was an error sending your message. Please try again later.')
                        ->withInput();
        }
    }

    // In App\Http\Controllers\ContactController.php

public function index()
{
    // Your code here
    return view('contactUs.contactus');
}
}