<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\MealConsumptionController;
use App\Http\Controllers\StudentSettingsController;
use App\Http\Controllers\studentSettings;
use App\Http\Controllers\SupplierManagementController;
use App\Http\Controllers\StudentHomeController;
use App\Http\Controllers\studentMenuController; 

Route::get('/', function () {
    return view('welcome');
});

// Admin Routes
Route::prefix('admin')->group(function () {
    Route::get('/notifications', [NotificationController::class, 'showNotification'])
        ->name('admin.notifications');
    
    Route::get('/user-management', [ManagedUserController::class, 'view'])
        ->name('admin.user-management');
    
    Route::resource('users', ManagedUserController::class);
});

Route::get('/admin/usermanagement', [ManagedUserController::class, 'view'])->name('admin.adminUserM');
//Admin Supplier Management

Route::get('/admin/supplier', [SupplierManagementController::class, 'showSupplier'])->name('AdminSupplierManagement');


//Student Meal Consumption

Route::get('/student/mealconsumption', [MealConsumptionController::class, 'viewConsumption'])->name('student.studentMeal');

Route::get('/student/student-meals', [MealConsumptionController::class, 'viewConsumption'])->name('student.mealconsumption');

Route::get('/student/student-meals/filter', [MealConsumptionController::class, 'mealConsumptionMethods'])->name('student.mealconsumption.filter');

//Student Settings

Route::get('/student/settings', [StudentSettingsController::class, 'viewSettings'])->name('student.studentSettings');
Route::post('/student/settings/update', [StudentSettingsController::class, 'updateSettings'])->name('student.settings.update');
Route::get('/student/settings', [studentSettings::class, 'viewSettings'])->name('student.studentSettings');
Route::post('/student/settings/update', [studentSettings::class, 'updateSettings'])->name('student.settings.update');

//Student Home

Route::get('student/home', [StudentHomeController::class, 'viewStudentHome'])->name('student.studentHome');
// Student Routes
Route::prefix('student')->group(function () {
    // Meal Consumption Routes
    Route::get('/meal-consumption', [MealConsumptionController::class, 'viewConsumption'])
        ->name('student.meal-consumption');
    
    Route::get('/meals', [MealConsumptionController::class, 'viewConsumption'])
        ->name('student.meals');
    
    Route::get('/meals/filter', [MealConsumptionController::class, 'mealConsumptionMethods'])
        ->name('student.meals.filter');
    
    // Settings Routes
    Route::get('/settings', [studentSettingsController::class, 'viewSettings'])
        ->name('student.settings');
    
    Route::post('/settings/update', [studentSettingsController::class, 'updateSettings'])
        ->name('student.settings.update');

    //Student Menu Routes
    Route::get('/menu', [studentMenuController::class, 'index'])
        ->name('student.studentDailyMenu');
    Route::get('/menu/show', [studentMenuController::class, 'show'])
        ->name('student.studentDailyMenu.show');
});
