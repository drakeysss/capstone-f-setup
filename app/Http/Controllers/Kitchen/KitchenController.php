<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;

class KitchenController extends Controller
{
    public function mealPlanning()
    {
        $recipes = Recipe::all();
        return view('kitchen.meal-planning', compact('recipes'));
    }
} 