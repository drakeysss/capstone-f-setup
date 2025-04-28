<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\AdminDashboardController;
use App\Http\Controllers\Student\StudentDashboardController;
use App\Http\Controllers\Cook\CookDashboardController;
use App\Http\Controllers\Admin\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Public routes
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Temporary route to check users (remove this in production)
Route::get('/check-users', function() {
    return App\Models\User::all();
});

// Admin Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/reports', [AdminController::class, 'reports'])->name('reports');
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
    Route::get('/users', [AdminController::class, 'users'])->name('users');
    
    
    // System Management
    Route::get('/suppliers', [AdminDashboardController::class, 'suppliers'])->name('suppliers');
    Route::get('/notifications', [AdminDashboardController::class, 'notifications'])->name('notifications');
    Route::post('/settings', [AdminDashboardController::class, 'updateSettings'])->name('settings.update');
    
    // Analytics
    Route::get('/analytics', [AdminDashboardController::class, 'analytics'])->name('analytics');
});

// Student Routes
Route::middleware(['auth', 'role:student'])->prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', [StudentDashboardController::class, 'index'])->name('dashboard');
    Route::get('/menu', [StudentDashboardController::class, 'menu'])->name('menu');
    Route::get('/profile', [StudentDashboardController::class, 'profile'])->name('profile');
    Route::get('/notifications', [StudentDashboardController::class, 'notifications'])->name('notifications');
    Route::get('/settings', [StudentDashboardController::class, 'settings'])->name('settings');
    Route::get('/history', [StudentDashboardController::class, 'history'])->name('history');
    Route::get('/reports', [StudentDashboardController::class, 'reports'])->name('reports');
});

// Cook Routes
Route::middleware(['auth', 'role:cook'])->prefix('cook')->name('cook.')->group(function () {
    Route::get('/dashboard', [CookDashboardController::class, 'index'])->name('dashboard');
    Route::get('/consumption', [CookDashboardController::class, 'consumption'])->name('consumption');
    Route::get('/inventory', [CookDashboardController::class, 'inventory'])->name('inventory');
    Route::get('/profile', [CookDashboardController::class, 'profile'])->name('profile');
    Route::get('/settings', [CookDashboardController::class, 'settings'])->name('settings');
    Route::get('/suppliers', [CookDashboardController::class, 'suppliers'])->name('suppliers');
    Route::get('/reports', [CookDashboardController::class, 'reports'])->name('reports');
    Route::get('/notifications', [CookDashboardController::class, 'notifications'])->name('notifications');
    Route::get('/orders', [CookDashboardController::class, 'orders'])->name('orders');
    Route::get('/menu', [CookDashboardController::class, 'menu'])->name('menu');
    Route::get('/schedule', [CookDashboardController::class, 'schedule'])->name('schedule');
});
