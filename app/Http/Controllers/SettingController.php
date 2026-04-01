<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Inertia\Inertia;

class SettingController extends Controller
{
    public function index()
    {
        // Fetch all settings and pluck them into a simple key-value array for Vue
        $settings = Setting::pluck('value', 'key')->toArray();

        // Default values if the database is empty
        $defaultSettings = [
            'contact_email' => 'hello@almond-blossoms.com',
            'contact_phone' => '07851 296 121',
            'contact_location' => 'Essex & Across U.K.',
            'social_instagram' => 'https://instagram.com/almondblossomsevents',
            'social_pinterest' => '',
            'brand_name' => 'Almond-Blossoms',
            'brand_tagline' => 'Relaxed Celebrations & Cherished Memories',
        ];

        return Inertia::render('Admin/Settings/Index', [
            // Merge defaults with database values
            'settings' => array_merge($defaultSettings, $settings),
        ]);
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'contact_email' => 'required|email',
            'contact_phone' => 'nullable|string',
            'contact_location' => 'nullable|string',
            'social_instagram' => 'nullable|url',
            'social_pinterest' => 'nullable|url',
            'brand_name' => 'required|string',
            'brand_tagline' => 'nullable|string',
        ]);

        // Loop through the submitted settings and update or create them
        foreach ($validated as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value, 'group' => explode('_', $key)[0]] // Group by prefix (e.g., 'contact')
            );
        }

        return redirect()->back()->with('success', 'Brand settings updated successfully.');
    }
}
