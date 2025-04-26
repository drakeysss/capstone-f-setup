<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\ManagedUserController;
use App\Http\Controllers\MealConsumptionController;
use App\Http\Controllers\StudentSettingsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/notifications', [NotificationController::class, 'showNotification'])->name('AdminNotif');

Route::get('/admin/usermanagement', [ManagedUserController::class, 'view'])->name('admin.adminUserM');

Route::resource('users', ManagedUserController::class);

//Student Meal Consumption

Route::get('/student/mealconsumption', [MealConsumptionController::class, 'viewConsumption'])->name('student.studentMeal');

Route::get('/student/student-meals', [MealConsumptionController::class, 'viewConsumption'])->name('student.mealconsumption');

Route::get('/student/student-meals/filter', [MealConsumptionController::class, 'mealConsumptionMethods'])->name('student.mealconsumption.filter');

//Student Settings

Route::get('/student/settings', [StudentSettingsController::class, 'viewSettings'])->name('student.studentSettings');
Route::post('/student/settings/update', [StudentSettingsController::class, 'updateSettings'])->name('student.settings.update');