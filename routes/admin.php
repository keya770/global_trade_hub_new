<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

// Admin Dashboard
Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');

// Add more admin routes here as needed
// Route::get('/users', [AdminController::class, 'users'])->name('users');
// Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
