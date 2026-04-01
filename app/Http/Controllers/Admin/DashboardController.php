<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Inquiry;
use App\Models\Post;
use Inertia\Inertia;

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Fetch KPI Metrics
        $metrics = [
            'unread_inquiries' => Inquiry::where('status', 'unread')->count(),
            'total_inquiries' => Inquiry::count(),
            'published_posts' => Post::where('status', 'published')->count(),
            'total_views' => Post::where('status', 'published')->sum('views'),
        ];

        // 2. Fetch the 5 most recent inquiries
        $recentInquiries = Inquiry::latest()
            ->take(5)
            ->get()
            ->map(fn ($inquiry) => [
                'id' => $inquiry->id,
                'name' => $inquiry->name,
                'event_type' => $inquiry->event_type,
                'status' => $inquiry->status,
                'date' => $inquiry->created_at->diffForHumans(),
            ]);

        // 3. Fetch the 3 most recent drafts
        $recentDrafts = Post::where('status', 'draft')
            ->latest()
            ->take(3)
            ->get()
            ->map(fn ($post) => [
                'id' => $post->id,
                'title' => $post->title,
                'category' => $post->category,
                'date' => $post->updated_at->diffForHumans(),
            ]);

        return Inertia::render('Dashboard', [
            'metrics' => $metrics,
            'recentInquiries' => $recentInquiries,
            'recentDrafts' => $recentDrafts,
        ]);
    }
}
