<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use Inertia\Inertia;

class InquiryController extends Controller
{
    public function index()
    {
        // Fetch inquiries for the table
        $inquiries = Inquiry::latest()->paginate(15)->through(fn ($inquiry) => [
            'id' => $inquiry->id,
            'first_name' => $inquiry->first_name,
            'last_name' => $inquiry->last_name,
            'email' => $inquiry->email,
            'phone' => $inquiry->phone,
            'event_location' => $inquiry->event_location,
            'event_date' => $inquiry->event_date,
            'guest_numbers' => $inquiry->guest_numbers,
            'approximate_budget' => $inquiry->approximate_budget,
            'found_us_via' => $inquiry->found_us_via,
            'event_type' => $inquiry->event_type,
            'message' => $inquiry->message,
            'status' => $inquiry->status,
            'date_received' => $inquiry->created_at->diffForHumans(),
        ]);

        // Calculate metrics for the KPI Bar
        $metrics = [
            'unread' => Inquiry::where('status', 'unread')->count(),
            'weddings' => Inquiry::where('event_type', 'wedding')->count(),
            'celebrations' => Inquiry::where('event_type', 'celebration')->count(),
            'creche' => Inquiry::where('event_type', 'creche')->count(),
        ];

        return Inertia::render('Admin/Inquiries/Index', [
            'inquiries' => $inquiries,
            'metrics' => $metrics // Pass the new metrics down to Vue!
        ]);
    }

    // Mark an inquiry as read
    public function markAsRead(Inquiry $inquiry)
    {
        $inquiry->update(['status' => 'read']);

        return redirect()->back();
    }

    public function markAsUnread(Inquiry $inquiry)
    {
        $inquiry->update(['status' => 'unread']);
        return redirect()->back();
    }

    public function destroy(Inquiry $inquiry)
    {
        $inquiry->delete();

        return redirect()->back()->with('success', 'Inquiry deleted.');
    }
}
