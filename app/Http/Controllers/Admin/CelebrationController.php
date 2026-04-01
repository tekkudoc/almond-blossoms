<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Celebration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class CelebrationController extends Controller
{
    public function index()
    {
        $celebrations = Celebration::orderBy('sort_order')->get()->map(fn($item) => [
            'id' => $item->id,
            'title' => $item->title,
            'image' => $item->image_url,
            'sort_order' => $item->sort_order,
        ]);
        return Inertia::render('Admin/Celebrations/Index', ['celebrations' => $celebrations]);
    }

    public function create()
    {
        return Inertia::render('Admin/Celebrations/Create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'featured_image' => 'required|image|max:2048',
            'sort_order' => 'required|integer',
        ]);

        $validated['featured_image'] = $request->file('featured_image')->store('celebrations', 'public');
        Celebration::create($validated);

        return redirect('/admin/celebrations')->with('success', 'Celebration added to portfolio.');
    }

    public function edit(Celebration $celebration)
    {
        // NEW, FIXED CODE:
        return Inertia::render('Admin/Celebrations/Edit', [
            'celebration' => [
                'id' => $celebration->id,
                'title' => $celebration->title,
                'description' => $celebration->description,
                'sort_order' => $celebration->sort_order,
                // This is the missing piece! We explicitly call the accessor.
                'image_url' => $celebration->image_url,
            ]
        ]);
    }

    public function update(Request $request, Celebration $celebration)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'featured_image' => 'nullable|image|max:2048',
            'sort_order' => 'required|integer',
        ]);

        if ($request->hasFile('featured_image')) {
            if ($celebration->featured_image) Storage::disk('public')->delete($celebration->featured_image);
            $validated['featured_image'] = $request->file('featured_image')->store('celebrations', 'public');
        }

        $celebration->update($validated);

        return redirect('/admin/celebrations')->with('success', 'Celebration updated.');
    }

    public function destroy(Celebration $celebration)
    {
        if ($celebration->featured_image) Storage::disk('public')->delete($celebration->featured_image);
        $celebration->delete();

        return redirect('/admin/celebrations')->with('success', 'Celebration removed from portfolio.');
    }
}
