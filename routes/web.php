<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Student\StudentDashboardController;
use App\Http\Controllers\Cook\CookDashboardController;
use App\Http\Controllers\Cook\SupplierController;
use App\Http\Controllers\Cook\MenuController;
use App\Http\Controllers\Cook\InventoryController;
use App\Http\Controllers\Cook\OrderController;
use App\Http\Controllers\Kitchen\KitchenDashboardController;
use App\Http\Controllers\Student\StudentReportController;
use App\Http\Controllers\Student\StudentHistoryController;

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

// Admin Routes
Route::middleware(['auth', 'role:admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
    Route::get('/reports', [AdminController::class, 'reports'])->name('reports');
    Route::get('/settings', [AdminController::class, 'settings'])->name('settings');
    Route::post('/settings', [AdminController::class, 'updateSettings'])->name('settings.update');
    Route::get('/suppliers', [AdminController::class, 'suppliers'])->name('suppliers');
    Route::get('/notifications', [AdminController::class, 'notifications'])->name('notifications');
});

// Student Routes
Route::middleware(['auth', 'role:student'])->prefix('student')->name('student.')->group(function () {
    Route::get('/dashboard', [StudentDashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/menu', [StudentDashboardController::class, 'menu'])->name('menu');
    Route::get('/notifications', [StudentDashboardController::class, 'notifications'])->name('notifications');
    Route::get('/settings', [StudentDashboardController::class, 'settings'])->name('settings');
    Route::get('/history', [StudentHistoryController::class, 'index'])->name('history');
    Route::put('/history/{report}', [StudentHistoryController::class, 'updateRating'])->name('history.update');
    Route::get('/reports', [StudentDashboardController::class, 'reports'])->name('reports');
    Route::post('/reports', [StudentDashboardController::class, 'storeReport'])->name('reports.store');
});

// Cook Routes
Route::middleware(['auth', 'role:cook'])->prefix('cook')->name('cook.')->group(function () {
    // Dashboard & Overview
    Route::get('/dashboard', [CookDashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/reports', [CookDashboardController::class, 'reports'])->name('reports');
    Route::get('/settings', [CookDashboardController::class, 'settings'])->name('settings');
    Route::get('/notifications', [CookDashboardController::class, 'notifications'])->name('notifications');

    // Order Management
    Route::get('/orders', [OrderController::class, 'index'])->name('orders');
    Route::post('/orders/{order}/update-status', [OrderController::class, 'updateStatus'])->name('orders.update-status');

    // Menu Management
    Route::get('/menu', [MenuController::class, 'index'])->name('menu');
    Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
    Route::put('/menu/{menu}', [MenuController::class, 'update'])->name('menu.update');
    Route::delete('/menu/{menu}', [MenuController::class, 'destroy'])->name('menu.delete');

    // Inventory Management
    Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory');
    Route::get('/inventory/{item}', [InventoryController::class, 'viewIngredient'])->name('inventory.show');
    Route::post('/inventory', [InventoryController::class, 'store'])->name('inventory.store');
    Route::put('/inventory/{item}', [InventoryController::class, 'update'])->name('inventory.update');
    Route::delete('/inventory/{item}', [InventoryController::class, 'destroy'])->name('inventory.delete');

    // Supplier Management
    Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
    Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store');
    Route::put('/suppliers/{supplier}', [SupplierController::class, 'update'])->name('suppliers.update');
    Route::delete('/suppliers/{supplier}', [SupplierController::class, 'destroy'])->name('suppliers.destroy');
    Route::post('/suppliers/purchase-order', [SupplierController::class, 'createPurchaseOrder'])->name('suppliers.purchase-order');
});

// Kitchen Routes
Route::middleware(['auth', 'role:kitchen'])->prefix('kitchen')->name('kitchen.')->group(function () {
    // Dashboard & Overview
    Route::get('/dashboard', [KitchenDashboardController::class, 'dashboard'])->name('dashboard');


    // Reports & Analytics
    Route::get('/reports', [KitchenDashboardController::class, 'reports'])->name('reports');
    Route::get('/reports/form', [KitchenDashboardController::class, 'viewReport'])->name('reportsForm');
    Route::post('/reports/store', [KitchenDashboardController::class, 'storeReport'])->name('reports.store');




    // Alerts & Notifications
    Route::get('/alerts', [KitchenDashboardController::class, 'alerts'])->name('alerts');

    // Recipe & Meal Planning
    Route::get('/recipes', [KitchenDashboardController::class, 'recipes'])->name('recipes');
    Route::get('/meal-planning', [KitchenDashboardController::class, 'mealPlanning'])->name('meal-planning');

    // Inventory Management
    Route::get('/inventory', [KitchenDashboardController::class, 'inventory'])->name('inventory');
    Route::get('/inventory/{item}', [KitchenDashboardController::class, 'viewIngredient'])->name('inventory.show');
    Route::post('/inventory', [KitchenDashboardController::class, 'storeIngredient'])->name('inventory.store');
    Route::put('/inventory/{item}', [KitchenDashboardController::class, 'updateIngredient'])->name('inventory.update');
    Route::delete('/inventory/{item}', [KitchenDashboardController::class, 'destroyIngredient'])->name('inventory.delete');

    // Settings
    Route::get('/settings', [KitchenDashboardController::class, 'settings'])->name('settings');
});

// Student Reports Routes
Route::middleware(['auth', 'student'])->group(function () {
    Route::get('/student/reports', [StudentReportController::class, 'index'])->name('student.reports');
    Route::put('/student/reports/{report}', [StudentReportController::class, 'update'])->name('student.reports.update');
    Route::delete('/student/reports/{report}', [StudentReportController::class, 'destroy'])->name('student.reports.destroy');
});
