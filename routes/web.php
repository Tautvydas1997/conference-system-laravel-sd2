<?php

/**
 * Web routes for Conference Management System
 */

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ConferenceController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

// Authentication routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Client subsystem (requires authentication)
Route::prefix('client')->name('client.')->middleware('auth')->group(function () {
    Route::get('/conferences', [ClientController::class, 'index'])->name('index');
    Route::get('/conferences/{id}', [ClientController::class, 'show'])->name('show');
    Route::post('/conferences/{id}/register', [ClientController::class, 'register'])->name('register');
});

// Employee subsystem (requires employee role)
Route::prefix('employee')->name('employee.')->middleware(['auth', 'role:employee'])->group(function () {
    Route::get('/conferences', [EmployeeController::class, 'index'])->name('index');
    Route::get('/conferences/{id}', [EmployeeController::class, 'show'])->name('show');
});

// Admin subsystem (requires admin role)
Route::prefix('admin')->name('admin.')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/', [AdminController::class, 'index'])->name('index');
    
    // User management
    Route::prefix('users')->name('users.')->group(function () {
        Route::get('/', [UserController::class, 'index'])->name('index');
        Route::get('/{id}/edit', [UserController::class, 'edit'])->name('edit');
        Route::put('/{id}', [UserController::class, 'update'])->name('update');
    });
    
    // Conference management
    Route::prefix('conferences')->name('conferences.')->group(function () {
        Route::get('/', [ConferenceController::class, 'index'])->name('index');
        Route::get('/create', [ConferenceController::class, 'create'])->name('create');
        Route::post('/', [ConferenceController::class, 'store'])->name('store');
        Route::get('/{id}/edit', [ConferenceController::class, 'edit'])->name('edit');
        Route::put('/{id}', [ConferenceController::class, 'update'])->name('update');
        Route::delete('/{id}', [ConferenceController::class, 'destroy'])->name('destroy');
    });
});

// Common conference show route (can be used by multiple roles)
Route::get('/conferences/{id}', function ($id) {
    // This is a shared route - redirect based on context
    // For now, redirect to client view
    return redirect()->route('client.show', $id);
})->name('conferences.show');

// Common conference index route
Route::get('/conferences', function () {
    return redirect()->route('client.index');
})->name('conferences.index');
