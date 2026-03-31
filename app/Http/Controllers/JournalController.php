<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Inertia\Inertia;

class JournalController extends Controller
{
    /**
     * Display a listing of the published journal posts.
     */
    public function index()
    {
        // Fetch all published posts, ordered by the newest first
        $posts = Post::where('status', 'published')
            ->latest()
            ->get()
            ->map(function ($post) {
                return [
                    'id' => $post->id,
                    'title' => $post->title,
                    'slug' => $post->slug,
                    'category' => $post->category,
                    'excerpt' => $post->excerpt,
                    // Format the date beautifully for the frontend (e.g., "May 14, 2026")
                    'date' => $post->created_at->format('F j, Y'),
                    // Use the accessor we defined in the Model, or fallback to a default image
                    'image' => $post->image_url ?? 'https://images.unsplash.com/photo-1518049362265-d5b2a6467637?q=80&w=800&auto=format&fit=crop',
                ];
            });

        return Inertia::render('Journal', [
            'posts' => $posts,
        ]);
    }

    /**
     * Display a single journal post.
     */
    public function show($slug)
    {
        // Find the post by its slug, ensuring it is published
        $post = Post::where('slug', $slug)
            ->where('status', 'published')
            ->firstOrFail();

        // Increment the views counter
        $post->increment('views');

        return Inertia::render('Journal/Show', [
            'post' => [
                'id' => $post->id,
                'title' => $post->title,
                'content' => $post->content,
                'category' => $post->category,
                'date' => $post->created_at->format('F j, Y'),
                'image' => $post->image_url,
                'seo_title' => $post->seo_title ?? $post->title,
                'seo_description' => $post->seo_description ?? $post->excerpt,
            ],
        ]);
    }
}
