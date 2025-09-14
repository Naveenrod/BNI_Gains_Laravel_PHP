<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DashboardController;  // Add this import
use Illuminate\Support\Facades\Route;

// Home route
Route::get('/', function () {
    return view('welcome');
});

// Authentication routes
require __DIR__.'/auth.php';  // Fixed __DIR__

// Protected routes (require authentication)
Route::middleware(['auth', 'verified'])->group(function () {
    // Dashboard - using controller instead of closure
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // User profile management (different from business profiles)
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Business profiles management
    Route::resource('profiles', ProfileController::class);
    
    // Additional profile routes
    Route::get('/profiles/{profile}/pdf', [ProfileController::class, 'pdf'])->name('profiles.pdf');
    Route::get('/profiles/{profile}/qr-code', [ProfileController::class, 'qrCode'])->name('profiles.qr-code');
});

// Public routes (no authentication required)
Route::get('/public-profile/{slug}', [ProfileController::class, 'public'])->name('public.profile');