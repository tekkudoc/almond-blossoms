<?php

namespace App\Http\Controllers;

use App\Models\Celebration;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CelebrationController extends Controller
{
    public function index()
    {
        $celebrations = Celebration::orderBy('sort_order')->get()->map(fn($item) => [
            'id' => $item->id,
            'title' => $item->title,
            'image' => $item->image_url,
        ]);

        return Inertia::render('Celebrations', ['celebrations' => $celebrations]);
    }
}
