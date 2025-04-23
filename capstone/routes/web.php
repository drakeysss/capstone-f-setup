<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ManagedUserController;
use App\Http\Controllers\MealConsumptionController;
use App\Http\Controllers\studentSettingsController;
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