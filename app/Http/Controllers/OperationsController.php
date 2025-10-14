<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Subscriber;
use App\Mail\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class OperationsController extends Controller
{
    public function faq()
    {
        return view('faq');
    }

    public function submitContact(Request $request)
    {
        // 1. Validate
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|max:5000',
        ]);

        // 2. Save to DB
        $contact = Contact::create($validated);

        // 3. Send email to admin
        Mail::to('kevenraymond77@gmail.com')->send(new ContactMessage($contact));

        // 4. OPTIONAL: Send to subscribers
        $subscribers = Subscriber::pluck('email')->toArray();
        foreach ($subscribers as $subscriberEmail) {
            Mail::to($subscriberEmail)->send(new ContactMessage($contact));
        }

        return back()->with('success', 'Message sent successfully!');
    }


    public function support()
    {
        return view('support');
    }
}
