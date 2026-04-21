<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InquiryController;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\CelebrationController as AdminCelebrationController;
use App\Http\Controllers\CelebrationController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\JournalController;
use App\Http\Controllers\SettingController;
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

Route::get('/wedding', function () {
    return Inertia::render('Wedding');
})->name('weddings');

Route::get('/celebrations', function () {
    return Inertia::render('Celebration');
})->name('celebration');

Route::get('/creche', function () {
    return Inertia::render('Creche');
})->name('services.creche');

Route::get('/vendors', function () {
    return Inertia::render('Vendors');
})->name('vendors');

Route::get('/privacy-policy', function () {
    return Inertia::render('PrivacyPolicy');
})->name('privacy');

Route::get('/terms-and-conditions', function () {
    return Inertia::render('Terms');
})->name('terms');

Route::get('/photography-credits', function () {
    return Inertia::render('Credits');
})->name('credits');

Route::get('/celebrations', [CelebrationController::class, 'index'])->name('celebrations.index');

Route::get('/journal', [JournalController::class, 'index'])->name('journal.index');
Route::get('/journal/{slug}', [JournalController::class, 'show'])->name('journal.show');

Route::get('/contact', function () {
    return Inertia::render('Contact');
})->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::prefix('admin')->group(function () {
        // Admin Journal CRUD
        Route::get('/posts', [PostController::class, 'index'])->name('admin.journal.index');
        Route::get('/posts/create', [PostController::class, 'create'])->name('admin.journal.create');
        Route::post('/posts', [PostController::class, 'store'])->name('admin.journal.store');
        Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('admin.journal.edit');
        Route::put('/posts/{post}', [PostController::class, 'update'])->name('admin.journal.update');
        Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('admin.journal.destroy');

        Route::resource('celebrations', AdminCelebrationController::class)->except(['show']);

        // Inquiries
        Route::get('/inquiries', [InquiryController::class, 'index'])->name('inquiries.index');
        Route::put('/inquiries/{inquiry}/read', [InquiryController::class, 'markAsRead'])->name('inquiries.read');
        Route::put('/inquiries/{inquiry}/unread', [InquiryController::class, 'markAsUnread'])->name('inquiries.unread');
        Route::delete('/inquiries/{inquiry}', [InquiryController::class, 'destroy'])->name('inquiries.destroy');

        // Manage Celebrations/Events Portfolio
        Route::get('/events', function () {
            return Inertia::render('Admin/Events/Index');
        })->name('events.index');

        // Admin Settings
        Route::get('/settings', [SettingController::class, 'index'])->name('settings.index');
        Route::post('/settings', [SettingController::class, 'update'])->name('settings.update');
    });

});

require __DIR__.'/settings.php';
