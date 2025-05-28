<?php

namespace App\Http\Controllers\Kitchen;

use App\Http\Controllers\Dashboard\BaseDashboardController;
use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\Ingredient;

class KitchenDashboardController extends BaseDashboardController
{
    public function __construct()
    {
        parent::__construct('kitchen', 'kitchen');
    }

    protected function getDashboardData()
    {
        $data = parent::getDashboardData();
        $data['recentOrders'] = $data['recentOrders']->take(5);
        return $data;
    }

    // Recipe & Meal
    public function mealPlanning()
    {

            $all = Recipe::all();


            $recipes = $all
      ->mapWithKeys(fn($r) => [
         $r->recipe_name => [
           'week' => $r->recipe_week,
           'day'  => $r->recipe_day,
           'type' => $r->recipe_type
         ]
      ]);

        $grouped = $all->groupBy('recipe_week');

      $weekMenus = [
        1 => $grouped->get('Week 1 & 3')
              ->groupBy('recipe_day')
              ->map(fn($dayGroup) => [
                  $dayGroup->firstWhere('recipe_type','Breakfast')->recipe_name ?? null,
                  $dayGroup->firstWhere('recipe_type','Lunch')   ->recipe_name ?? null,
                  $dayGroup->firstWhere('recipe_type','Dinner')  ->recipe_name ?? null,
                  $dayGroup->firstWhere('recipe_type','Snacks')  ->recipe_name ?? null,
              ])
              ->values(), 

        2 => $grouped->get('Week 2 & 4')
              ->groupBy('recipe_day')
              ->map(fn($dayGroup) => [
                  $dayGroup->firstWhere('recipe_type','Breakfast')->recipe_name ?? null,
                  $dayGroup->firstWhere('recipe_type','Lunch')   ->recipe_name ?? null,
                  $dayGroup->firstWhere('recipe_type','Dinner')  ->recipe_name ?? null,
                  $dayGroup->firstWhere('recipe_type','Snacks')  ->recipe_name ?? null,
              ])
              ->values(),
      ];


      $recipesJson = json_encode($recipes); 
      $weekMenusJson = json_encode($weekMenus); 
  

      return view('kitchen.meal-planning', [
        'recipesJson'  => $recipesJson,
        'weekMenusJson'=> $weekMenusJson,
      ]);
    }




    public function preparation()
    {
        return view('kitchen.preparation');
    }

    public function orders()
    {
        return view('kitchen.orders');
    }

    // Inventory Management
    public function inventory()
    {
        $ingredients = Ingredient::all()->map(function ($ingredient) {
            if ($ingredient->ingredient_quantity < 10) {
                $ingredient->data_status = 'low stock';
            } elseif ($ingredient->ingredient_quantity == 0) {
                $ingredient->data_status = 'out of stock';
            } else {
                $ingredient->data_status = 'in stock';
            }
            return $ingredient;
        });

        $lowStockCount = $ingredients->filter(function ($ingredient) {
            return $ingredient->ingredient_quantity < 10;
        })->count();

        $totalIngredients = $ingredients->count();

            
        return view('kitchen.inventory', compact('ingredients', 'lowStockCount', 'totalIngredients'));
    }

        public function viewIngredient($id){

        $ingredient = Ingredient::findOrFail($id);
        return view('kitchen.viewIngredient', compact('ingredient'));
        }

        public function updateIngredient(Request $request, $id)
        {
            $ingredient = Ingredient::findOrFail($id);
            $ingredient->update($request->all());
            return redirect()->route('kitchen.inventory')->with('success', 'Ingredient updated successfully.');
        }
    public function storeIngredient(Request $request)
    {
        $request->validate([
            'ingredient_name' => 'required|string|max:255',
            'ingredient_category' => 'nullable|string|max:255',
            'ingredient_unit' => 'nullable|string|max:50',
            'ingredient_price' => 'nullable|numeric',
            'ingredient_quantity' => 'nullable|integer',
        ]);

        Ingredient::create($request->all());
        return redirect()->route('kitchen.inventory')->with('success', 'Ingredient added successfully.');
    }

    public function deleteIngredient($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->delete();
        return redirect()->route('kitchen.inventory')->with('success', 'Ingredient deleted successfully.');
    }























    public function suppliers()
    {
        return view('kitchen.suppliers');
    }

    public function purchases()
    {
        return view('kitchen.purchases');
    }

    // Reports & Analytics
    public function reports()
    {
        return view('kitchen.reports');
    }

    public function analytics()
    {
        $data = $this->getAnalyticsData();
        return view('kitchen.analytics', $data);
    }

    public function viewReport()
    {
        return view('kitchen.reportsForm');
    }


    public function storeReport(Request $request)
    {
        // Handle the report submission logic here
        // For example, validate and save the report data
        $request->validate([
            'report_type' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'date' => 'required|date',
            
        ]);
        // Redirect or return a response as needed
        return redirect()->route('kitchen.reports')->with('success', 'Report submitted successfully.');
    }



    // Alerts & Notifications
    public function notifications()
    {
        return view('kitchen.notifications');
    }

    public function alerts()
    {
        return view('kitchen.alerts');
    }

    // Settings
    public function settings()
    {
        return view('kitchen.settings');
    }
}