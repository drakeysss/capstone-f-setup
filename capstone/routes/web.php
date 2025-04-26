<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\MealConsumptionController;
use App\Http\Controllers\studentSettings;
use App\Http\Controllers\SupplierManagementController;
use App\Http\Controllers\StudentHomeController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/notifications', [NotificationController::class, 'showNotification'])->name('AdminNotif');

//Admin Supplier Management

Route::get('/admin/supplier', [SupplierManagementController::class, 'showSupplier'])->name('AdminSupplierManagement');


//Student Meal Consumption

Route::get('/student/mealconsumption', [MealConsumptionController::class, 'viewConsumption'])->name('student.studentMeal');


Route::get('/student/student-meals ', [MealConsumptionController::class, 'viewConsumption'])->name('student.mealconsumption');

Route::get('/student/student-meals/filter', [MealConsumptionController::class, 'mealConsumptionMethods'])->name('student.mealconsumption.filter');

//Student Settings

Route::get('/student/settings', [studentSettings::class, 'viewSettings'])->name('student.studentSettings');
Route::post('/student/settings/update', [studentSettings::class, 'updateSettings'])->name('student.settings.update');

//Student Home

Route::get('student/home', [StudentHomeController::class, 'viewStudentHome'])->name('student.studentHome');