<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Auth\LoginController;
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
    Route::get('/orders/pending', [OrderController::class, 'pendingOrders'])->name('orders.pending');
    Route::get('/orders/completed', [OrderController::class, 'completedOrders'])->name('orders.completed');
    Route::post('/orders', [OrderController::class, 'store'])->name('orders.store');
    Route::post('/orders/{order}/complete', [OrderController::class, 'complete'])->name('orders.complete');
    Route::get('/orders/{order}', [OrderController::class, 'show'])->name('orders.show');

    // Menu Management
    Route::get('/menu', [MenuController::class, 'index'])->name('menu');
    Route::get('/menu/active', [OrderController::class, 'activeMenuItems'])->name('menu.active');
    Route::post('/menu', [MenuController::class, 'store'])->name('menu.store');
    Route::put('/menu/{menu}', [MenuController::class, 'update'])->name('menu.update');
    Route::delete('/menu/{menu}', [MenuController::class, 'destroy'])->name('menu.delete');

    // Inventory Management
    Route::get('/inventory', [InventoryController::class, 'index'])->name('inventory');
    Route::get('/inventory/low-stock', [OrderController::class, 'lowStockItems'])->name('inventory.low-stock');
    Route::get('/inventory/{item}', [InventoryController::class, 'viewIngredient'])->name('inventory.show');
    Route::post('/inventory', [InventoryController::class, 'store'])->name('inventory.store');
    Route::put('/inventory/{item}', [InventoryController::class, 'update'])->name('inventory.update');
    Route::delete('/inventory/{item}', [InventoryController::class, 'destroy'])->name('inventory.delete');

    // Supplier Management
    Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers.index');
    Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store');
    Route::put('/suppliers/{supplier}', [SupplierController::class, 'update'])->name('suppliers.update');
    Route::delete('/suppliers/{supplier}', [SupplierController::class, 'destroy'])->name('suppliers.destroy');
    Route::post('/suppliers/purchase-order', [SupplierController::class, 'purchaseOrder'])->name('suppliers.purchase-order');
    Route::get('/suppliers/purchase-orders', [SupplierController::class, 'getPurchaseOrders'])->name('suppliers.purchase-orders');
    Route::get('/purchase-order', [SupplierController::class, 'purchaseOrderPage'])->name('purchase-order.page');
    Route::post('/purchase-order/save', [SupplierController::class, 'purchaseOrder'])->name('purchase-order.save');
    Route::get('/purchase-order/list', [SupplierController::class, 'getPurchaseOrders'])->name('purchase-order.list');

    // Purchase Order Management
    Route::get('/purchase-orders/pending', [App\Http\Controllers\Cook\PurchaseOrderController::class, 'pending'])->name('purchase-orders.pending');
    Route::get('/purchase-orders/completed', [App\Http\Controllers\Cook\PurchaseOrderController::class, 'completed'])->name('purchase-orders.completed');
    Route::get('/purchase-orders', [App\Http\Controllers\Cook\PurchaseOrderController::class, 'index'])->name('purchase-orders.index');
    Route::get('/purchase-orders/create', [App\Http\Controllers\Cook\PurchaseOrderController::class, 'create'])->name('purchase-orders.create');
    Route::post('/purchase-orders', [App\Http\Controllers\Cook\PurchaseOrderController::class, 'store'])->name('purchase-orders.store');
    Route::get('/purchase-orders/{purchaseOrder}', [App\Http\Controllers\Cook\PurchaseOrderController::class, 'show'])->name('purchase-orders.show');
    Route::get('/purchase-orders/{purchaseOrder}/edit', [App\Http\Controllers\Cook\PurchaseOrderController::class, 'edit'])->name('purchase-orders.edit');
    Route::put('/purchase-orders/{purchaseOrder}', [App\Http\Controllers\Cook\PurchaseOrderController::class, 'update'])->name('purchase-orders.update');
    Route::delete('/purchase-orders/{purchaseOrder}', [App\Http\Controllers\Cook\PurchaseOrderController::class, 'destroy'])->name('purchase-orders.destroy');
    Route::put('/purchase-orders/{purchaseOrder}/status', [App\Http\Controllers\Cook\PurchaseOrderController::class, 'updateStatus'])->name('purchase-orders.status');

    // Weekly Menu Orders
    Route::get('/weekly-menu-orders', [App\Http\Controllers\Cook\WeeklyMenuOrderController::class, 'index'])->name('cook.weekly-menu-orders.index');
    Route::put('/weekly-menu-orders/{weeklyMenuOrder}', [App\Http\Controllers\Cook\WeeklyMenuOrderController::class, 'update'])->name('cook.weekly-menu-orders.update');
    Route::post('/weekly-menu-orders/{weeklyMenuOrder}/toggle-editability', [App\Http\Controllers\Cook\WeeklyMenuOrderController::class, 'toggleEditability'])->name('cook.weekly-menu-orders.toggle-editability');
});

// Kitchen Routes
Route::middleware(['auth', 'role:kitchen'])->prefix('kitchen')->name('kitchen.')->group(function () {
    // Dashboard & Overview
    Route::get('/dashboard', [KitchenDashboardController::class, 'dashboard'])->name('dashboard');

    // Reports & Analytics
    Route::get('/reports', [KitchenDashboardController::class, 'reports'])->name('reports');
    Route::post('/waste-entry', [KitchenDashboardController::class, 'storeWasteEntry'])->name('waste-entry.store');
    Route::get('/reports/form', [KitchenDashboardController::class, 'viewReport'])->name('reportsForm');
    Route::post('/reports/store', [KitchenDashboardController::class, 'storeReport'])->name('reports.store');

    // Alerts & Notifications
    Route::get('/alerts', [KitchenDashboardController::class, 'alerts'])->name('alerts');

    // Recipe & Meal Planning
    Route::get('/recipes', [KitchenDashboardController::class, 'recipes'])->name('recipes');
    Route::get('/meal-planning', [KitchenDashboardController::class, 'mealPlanning'])->name('meal-planning');

    // Inventory Management
    Route::get('/inventory', [KitchenDashboardController::class, 'inventory'])->name('inventory');
    Route::get('/inventory/dashboard', [KitchenDashboardController::class, 'inventoryDashboard'])->name('inventory.dashboard');
    Route::get('/inventory/generate', [KitchenDashboardController::class, 'generateInventory'])->name('inventory.generate');
    
    // Individual Ingredient Operations
    Route::get('/ingredient/{id}', [KitchenDashboardController::class, 'viewIngredient'])->name('ingredient.show');
    Route::post('/ingredient', [KitchenDashboardController::class, 'storeIngredient'])->name('ingredient.store');
    Route::put('/ingredient/{id}', [KitchenDashboardController::class, 'updateIngredient'])->name('ingredient.update');
    Route::delete('/ingredient/{id}', [KitchenDashboardController::class, 'deleteIngredient'])->name('ingredient.delete');

    // Settings
    Route::get('/settings', [KitchenDashboardController::class, 'settings'])->name('settings');
});

Route::middleware(['auth'])->group(function () {
    Route::prefix('kitchen')->group(function () {
        Route::get('/', [KitchenDashboardController::class, 'index'])->name('kitchen.index');
        Route::get('/reportForm', [KitchenDashboardController::class, 'getReportForm'])->name('kitchen.reports_form');
        Route::get('/reports', [KitchenDashboardController::class, 'reports'])->name('kitchen.reports');
        Route::post('/waste-entry', [KitchenDashboardController::class, 'storeWasteEntry'])->name('kitchen.waste-entry.store');
    });

    // Student Reports Routes
    Route::middleware(['auth', 'student'])->group(function () {
        Route::get('/student/reports', [StudentReportController::class, 'index'])->name('student.reports');
        Route::put('/student/reports/{report}', [StudentReportController::class, 'update'])->name('student.reports.update');
        Route::delete('/student/reports/{report}', [StudentReportController::class, 'destroy'])->name('student.reports.destroy');
    });
});