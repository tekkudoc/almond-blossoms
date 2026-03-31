<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use Laravel\Fortify\Features;

Route::inertia('/', 'Welcome', [
    'canRegister' => Features::enabled(Features::registration()),
])->name('home');

Route::get('/about', function () {
    return Inertia::render('About');
})->name('about');

Route::get('/services', function () {
    return Inertia::render('Services');
})->name('services');

Route::get('/weddings', function () {
    return Inertia::render('Wedding');
})->name('weddings');

Route::get('/celebrations', function () {
    return Inertia::render('Celebration');
})->name('celebration');

Route::get('/journal', function () {
    return Inertia::render('Journal');
})->name('journal');

Route::get('/contact', function () {
    return Inertia::render('Contact');
})->name('contact');

Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');


    Route::get('/posts', function () {
        return Inertia::render('Admin/Journal/Index');
    })->name('journal.index');

    // Show form to create a new post
    Route::get('/posts/create', function () {
        return Inertia::render('Admin/Journal/Create');
    })->name('journal.create');

    // Store a new post in the database
    // Route::post('/posts', [JournalController::class, 'store'])->name('journal.store');

    // Show form to edit an existing post
    Route::get('/posts/{post}/edit', function ($post) {
        return Inertia::render('Admin/Journal/Edit');
    })->name('journal.edit');

    // Update an existing post
    // Route::put('/posts/{post}', [JournalController::class, 'update'])->name('journal.update');

    // Delete a post
    // Route::delete('/posts/{post}', [JournalController::class, 'destroy'])->name('journal.destroy');

    // --- Other Admin Sections (Placeholders) ---
    // Manage Celebrations/Events Portfolio
    Route::get('/events', function () {
        return Inertia::render('Admin/Events/Index');
    })->name('events.index');

    // Manage Form Inquiries
    Route::get('/inquiries', function () {
        return Inertia::render('Admin/Inquiries/Index');
    })->name('inquiries.index');

    // Admin Settings
    Route::get('/settings', function () {
        return Inertia::render('Admin/Settings/Index');
    })->name('settings.index');
});

require __DIR__.'/settings.php';
