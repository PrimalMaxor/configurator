<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;

// Home
Route::get('/', [HomeController::class, 'index'])->name('home');

// Presets
Route::get('/presets/{type}/{material}', [HomeController::class, 'presets'])->name('presets');

// Start from scratch
Route::post('/start-from-scratch/{type}/{material}', [HomeController::class, 'startFromScratch'])->name('start-from-scratch');

// Configuration
Route::get('/configuration/{configuration}', [HomeController::class, 'configuration'])->name('configuration');

// Get svg variatns
Route::get('/configuration/{configuration}/technical', [HomeController::class, 'technical'])->name('configuration.technical');
Route::get('/configuration/{configuration}/visual', [HomeController::class, 'visual'])->name('configuration.visual');
