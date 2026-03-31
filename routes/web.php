<?php

use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\JournalController;
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

Route::get('/journal', [JournalController::class, 'index'])->name('journal.index');
Route::get('/journal/{slug}', [JournalController::class, 'show'])->name('journal.show');

Route::get('/contact', function () {
    return Inertia::render('Contact');
})->name('contact');

Route::middleware(['auth', 'verified'])->prefix('admin')->group(function () {
    Route::inertia('dashboard', 'Dashboard')->name('dashboard');


    // Admin Journal CRUD
    Route::get('/posts', [PostController::class, 'index'])->name('admin.journal.index');
    Route::get('/posts/create', [PostController::class, 'create'])->name('admin.journal.create');
    Route::post('/posts', [PostController::class, 'store'])->name('admin.journal.store');
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('admin.journal.edit');
    Route::put('/posts/{post}', [PostController::class, 'update'])->name('admin.journal.update');
    Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('admin.journal.destroy');

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
