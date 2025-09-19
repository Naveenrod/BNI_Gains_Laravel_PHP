<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
require __DIR__.'/auth.php';

Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // User profile (for account settings, not business profiles)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Business profiles
    Route::resource('profiles', ProfileController::class);

    // Extra profile actions
    Route::get('/profiles/{profile}/pdf', [ProfileController::class, 'pdf'])->name('profiles.pdf');
    Route::get('/profiles/{profile}/qr-code', [ProfileController::class, 'qrCode'])->name('profiles.qr-code');
    Route::get('/profiles/public/{slug}', [ProfileController::class, 'public'])->name('profiles.public');
});

// Public routes
Route::get('/public-profile/{slug}', [ProfileController::class, 'public'])->name('public.profile');
