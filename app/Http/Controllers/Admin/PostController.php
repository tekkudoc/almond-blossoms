<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Inertia\Inertia;

class PostController extends Controller
{
    // 1. List all posts in the Admin Table
    public function index()
    {
        $posts = Post::latest()->paginate(10)->through(function ($post) {
            return [
                'id' => $post->id,
                'title' => $post->title,
                'category' => $post->category,
                'status' => $post->status,
                'date' => $post->created_at->format('M j, Y'),
                'views' => $post->views,
                'image' => $post->image_url,
            ];
        });

        return Inertia::render('Admin/Journal/Index', [
            'posts' => $posts,
        ]);
    }

    // 2. Show the Create Form
    public function create()
    {
        return Inertia::render('Admin/Journal/Create');
    }

    // 3. Store the new post
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|string',
            'status' => 'required|in:draft,published',
            'excerpt' => 'nullable|string',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Generate a clean URL slug from the title
        $validated['slug'] = Str::slug($validated['title']).'-'.rand(100, 999);

        // Handle Image Upload
        if ($request->hasFile('featured_image')) {
            $path = $request->file('featured_image')->store('journal_images', 'public');
            $validated['featured_image'] = $path;
        }

        Post::create($validated);

        return redirect()->route('admin.journal.index')->with('success', 'Story published successfully.');
    }

    // 5. Show the Edit Form
    public function edit(Post $post)
    {
        return Inertia::render('Admin/Journal/Edit', [
            'post' => [
                'id' => $post->id,
                'title' => $post->title,
                'content' => $post->content,
                'excerpt' => $post->excerpt,
                'category' => $post->category,
                'status' => $post->status,
                'seo_title' => $post->seo_title,
                'seo_description' => $post->seo_description,
                'image_url' => $post->image_url, // For the preview
            ],
        ]);
    }

    // 6. Update the post
    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'required|string',
            'status' => 'required|in:draft,published',
            'excerpt' => 'nullable|string',
            'seo_title' => 'nullable|string|max:255',
            'seo_description' => 'nullable|string',
            'featured_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        // Handle new Image Upload
        if ($request->hasFile('featured_image')) {
            // Delete old image
            if ($post->featured_image) {
                Storage::disk('public')->delete($post->featured_image);
            }
            // Store new image
            $path = $request->file('featured_image')->store('journal_images', 'public');
            $validated['featured_image'] = $path;
        }

        $post->update($validated);

        // Flash message added for the custom toast notification
        return redirect()->route('admin.journal.index')->with('success', 'Story updated successfully.');
    }

    // 4. Delete post
    public function destroy(Post $post)
    {
        if ($post->featured_image) {
            Storage::disk('public')->delete($post->featured_image);
        }

        $post->delete();

        return redirect()->route('admin.journal.index')->with('success', 'Story deleted.');
    }
}
