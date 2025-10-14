<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;


class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
        ]);

        $email = $request->input('email');

        // Check if subscriber already exists
        $subscriber = Subscriber::where('email', $email)->first();
        if ($subscriber) {
            return redirect()->route('home')->with('info', 'You are already subscribed!');
        }

        // Save new subscriber
        $subscriber = Subscriber::create(['email' => $email]);

        // Send notification email
        try {
            Mail::to('info@somaconnect.or.tz')->send(new \App\Mail\NewSubscriberMail($subscriber));
        } catch (Exception $e) {
            // Optional: log mail error
            Log::error('Mail sending failed: ' . $e->getMessage());
        }

        return redirect()->route('home')->with('success', 'Thank you for subscribing!');
    }
}
