<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ConfiguratorController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VerificationController;
use App\Http\Middleware\IsVerified;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

// website routes
Route::get('/', [HomeController::class, 'index']);
Route::get('/configurator', [ConfiguratorController::class, 'index']);
Route::get('/configurator/{frameType}', [ConfiguratorController::class, 'configure']);

// verification routes
Route::get('/verification/user', [VerificationController::class, 'notice'])->name('verification.user');

// dashboard routes
Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', IsVerified::class])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
