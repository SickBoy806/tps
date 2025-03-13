<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NewsletterSubscription; // You'll need to create this model
use Illuminate\Support\Facades\Validator;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        // Validate email
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:newsletter_subscriptions,email',
        ]);

        if ($validator->fails()) {
            return back()->with('error', 'Invalid email or already subscribed.');
        }

        // Store subscription
        NewsletterSubscription::create([
            'email' => $request->email,
        ]);

        return back()->with('success', 'Thank you for subscribing to our newsletter!');
    }
}