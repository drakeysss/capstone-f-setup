<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentMeal;

class MealConsumptionController extends Controller
{
    public function viewConsumption()
    {

        $studentMeals = StudentMeal::all();
        return view('student.studentMeal', compact('studentMeals'));
    }
    public function mealConsumptionMethods(Request $request)
    {
        $search = $request->input('search');
        $date = $request->input('date');
        $mealType = $request->input('meal_type');

        $studentMeals = StudentMeal::query()
        ->when($search, fn($query) => $query->filter(['search' => $search]))
        ->when($date, fn($query) => $query->filterByDate($date))
        ->when($mealType, fn($query) => $query->filterByMealType($mealType))
        ->get();

        return view('student.studentMeal', compact('studentMeals'));
    }
}
