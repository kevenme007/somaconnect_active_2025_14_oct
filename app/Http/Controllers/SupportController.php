<?php
namespace App\Http\Controllers;

use App\Mail\SupportOfferNotification;
use App\Models\SupportOffer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SupportController extends Controller
{

    public function index()
    {
        $supportOffers = SupportOffer::latest()->get();
        return view('support.support_offers', compact('supportOffers'));
    }

    public function store(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'first_name'   => 'required|string|max:255',
            'last_name'    => 'required|string|max:255',
            'email'        => 'required|email|max:255',
            'phone'        => 'nullable|string|max:20',
            'support_type' => 'required|in:skills,resources,funds,other',
            'details'      => 'required|string',
        ]);

        // Save to database
        $supportOffer = SupportOffer::create($validated);

        // Send email notification to admin
        Mail::to('info@somaconnect.or.tz')->send(new SupportOfferNotification($supportOffer));

        // Redirect back with success message
        return back()->with('success', 'Thank you for your support! We will get in touch with you soon.');
    }

    public function show($id)
    {
        $offer = SupportOffer::findOrFail($id);
        return view('support.support_offer_details', compact('offer'));
    }

    public function destroy($id)
    {
        $offer = SupportOffer::findOrFail($id);
        $offer->delete();

        return redirect()->route('support.index')->with('success', 'Support offer deleted successfully.');
    }

}
