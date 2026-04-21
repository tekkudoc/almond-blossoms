<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        //dd($request->all());
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'event_location' => 'required|string|max:255',
            'event_type' => 'nullable|string|max:100',
            'event_date' => 'nullable|string|max:100',
            'guest_numbers' => 'nullable|string|max:100',
            'approximate_budget' => 'required|string|max:100',
            'found_us_via' => 'required|string|max:100',
            'message' => 'required|string',
        ]);

        Inquiry::create([
            'first_name' => $validated['first_name'],
            'last_name' => $validated['last_name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'event_type' => $validated['event_type'],
            'event_location' => $validated['event_location'],
            'event_date' => $validated['event_date'],
            'guest_numbers' => $validated['guest_numbers'],
            'approximate_budget' => $validated['approximate_budget'],
            'found_us_via' => $validated['found_us_via'],
            'message' => $validated['message'],
        ]);


        return redirect()->back()->with('success', 'Thank you. Your inquiry has been received.');
    }
}
