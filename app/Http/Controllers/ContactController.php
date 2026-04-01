<?php

namespace App\Http\Controllers;

use App\Models\Inquiry;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'nullable|string|max:50',
            'date' => 'nullable|string|max:100',
            'event_type' => 'required|string|max:100',
            'message' => 'required|string',
        ]);

        // Map the Vue form 'date' to the database 'event_date'
        Inquiry::create([
            'name' => $validated['name'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
            'event_date' => $validated['date'],
            'event_type' => $validated['event_type'],
            'message' => $validated['message'],
        ]);

        // Return a flash message that the Contact.vue page will catch
        return redirect()->back()->with('success', 'Thank you. Your inquiry has been received.');
    }
}
