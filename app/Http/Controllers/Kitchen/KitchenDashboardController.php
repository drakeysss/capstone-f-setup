<?php

namespace App\Http\Controllers\Kitchen;

use App\Http\Controllers\Dashboard\BaseDashboardController;
use Illuminate\Http\Request;
<<<<<<< HEAD
use Illuminate\Support\Facades\DB;
use App\Models\Recipe;
use App\Models\ReportReason;
use App\Models\WasteEntry;
=======
use App\Models\Recipe;
use App\Models\Ingredient;
>>>>>>> 82754a1e2f45f8a597819039003eb702cc4c5524

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
        
        try {
            $currentDay = now()->format('l');
            $currentWeek = (now()->week % 2 == 0) ? 'Week 2 & 4' : 'Week 1 & 3';
            
            $allRecipes = Recipe::all();
            $groupedRecipes = [];
            $dailyRecipes = [];
            
            foreach ($allRecipes as $recipe) {
                $week = $recipe->recipe_week;
                $day = $recipe->recipe_day;
                $type = $recipe->recipe_type;
                $name = $recipe->recipe_name;
                $status = $recipe->recipe_status;
                
                // Build the full grouped structure
                if (!isset($groupedRecipes[$week])) {
                    $groupedRecipes[$week] = [];
                }
                if (!isset($groupedRecipes[$week][$day])) {
                    $groupedRecipes[$week][$day] = [];
                }
                
                $groupedRecipes[$week][$day][$type] = [
                    'name' => $name,
                    'status' => $status,
                ];
                
                // Build the daily structure for current day
                if ($day === $currentDay && $week === $currentWeek) {
                    $dailyRecipes[$type] = [
                        'name' => $name,
                        'status' => $status,
                    ];
                }
            }
            
            $data['recipes'] = $groupedRecipes;
            $data['dailyRecipes'] = $dailyRecipes;
        } catch (\Exception $e) {
            \Log::error('Error in getDashboardData: ' . $e->getMessage());
            $data['recipes'] = [];
            $data['dailyRecipes'] = [];
        }
        
        return $data;
    }

    // Recipe & Meal
    public function mealPlanning()
    {
<<<<<<< HEAD
        try {
            $recipes = Recipe::all();
            
            $groupedRecipes = [];
            
            foreach ($recipes as $recipe) {
                $week = $recipe->recipe_week;
                $day = $recipe->recipe_day;
                $type = $recipe->recipe_type;
                $name = $recipe->recipe_name;
                $status = $recipe->recipe_status;
                
                if (!isset($groupedRecipes[$week])) {
                    $groupedRecipes[$week] = [];
                }
                if (!isset($groupedRecipes[$week][$day])) {
                    $groupedRecipes[$week][$day] = [];
                }
                
                $groupedRecipes[$week][$day][$type] =[
                     'name' => $name,
                    'status' => $status,
                ];
            }
            
            return view('kitchen.meal-planning', ['recipes' => $groupedRecipes]);
        } catch (\Exception $e) {
            \Log::error('Error in mealPlanning: ' . $e->getMessage());
            return view('kitchen.meal-planning', ['recipes' => []]);
        }
=======

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
>>>>>>> 82754a1e2f45f8a597819039003eb702cc4c5524
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


    public function inventoryDashboard()
    {
        return view('kitchen.inventory.dashboard');
    }
        
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

        return view('kitchen.inventory.dashboard', compact('ingredients', 'lowStockCount', 'totalIngredients'));
    }

<<<<<<< HEAD

    public function generateInventory()
    {
        

        return view('kitchen.inventory.generate');
=======
        public function viewIngredient($id){

        $ingredient = Ingredient::findOrFail($id);
        return view('kitchen.viewIngredient', compact('ingredient'));
        }

        public function updateIngredient(Request $request, $id)
        {
            $ingredient = Ingredient::findOrFail($id);
            $ingredient->update($request->all());
            return redirect()->route('kitchen.updateIngredient')->with('success', 'Ingredient updated successfully.');
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
        return redirect()->route('kitchen.inventory.dashboard')->with('success', 'Ingredient added successfully.');
    }

    public function deleteIngredient($id)
    {
        $ingredient = Ingredient::findOrFail($id);
        $ingredient->delete();
        return redirect()->route('kitchen.deleteIngredient')->with('success', 'Ingredient deleted successfully.');
>>>>>>> 82754a1e2f45f8a597819039003eb702cc4c5524
    }













<<<<<<< HEAD
    //Kitchen Suppliers Management
=======










>>>>>>> 82754a1e2f45f8a597819039003eb702cc4c5524
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
        $wasteReasons = ReportReason::withCount(['wasteEntries as total_entries'])
            ->withSum('wasteEntries as total_cost', 'cost')
            ->get()
            ->map(function ($reason) {
                $totalCost = WasteEntry::sum('cost');
                $reason->percentage = $totalCost > 0 
                    ? round(($reason->total_cost / $totalCost) * 100, 2)
                    : 0;
                return $reason;
            });

        $topWastes = WasteEntry::select('meal_name', 'meal_type',
                DB::raw('COUNT(*) as report_count'),
                DB::raw('SUM(quantity) as total_quantity'),
                DB::raw('SUM(cost) as total_cost'),
                DB::raw('AVG(quantity) as avg_quantity'))
            ->where('waste_date', '>=', now()->subMonths(3))
            ->groupBy('meal_name', 'meal_type')
            ->orderByDesc('total_cost')
            ->limit(5)
            ->get();

        return view('kitchen.reports', compact('wasteReasons', 'topWastes'));
    }

    public function storeWasteEntry(Request $request)
    {
        $validated = $request->validate([
            'meal_name' => 'required|string|max:255',
            'meal_type' => 'required|string|in:Breakfast,Lunch,Dinner,Snack',
            'reason_id' => 'required|exists:reports_reasons_list,report_id',
            'quantity' => 'required|numeric|min:0',
            'cost' => 'required|numeric|min:0',
            'waste_date' => 'required|date',
            'notes' => 'nullable|string'
        ]);

        WasteEntry::create($validated);

        return redirect()->route('kitchen.reports')
            ->with('success', 'Waste report submitted successfully');
    }

    public function getAnalyticsData()
    {
        $wasteReasons = ReportReason::withCount(['wasteEntries as total_entries'])
            ->withSum('wasteEntries as total_cost', 'cost')
            ->get()
            ->map(function ($reason) {
                $totalCost = WasteEntry::sum('cost');
                $reason->percentage = $totalCost > 0 
                    ? round(($reason->total_cost / $totalCost) * 100, 2)
                    : 0;
                return $reason;
            });

        $topWastes = WasteEntry::select('meal_name', 'meal_type',
                DB::raw('COUNT(*) as report_count'),
                DB::raw('SUM(quantity) as total_quantity'),
                DB::raw('SUM(cost) as total_cost'),
                DB::raw('AVG(quantity) as avg_quantity'))
            ->where('waste_date', '>=', now()->subMonths(3))
            ->groupBy('meal_name', 'meal_type')
            ->orderByDesc('total_cost')
            ->limit(5)
            ->get();

        return compact('wasteReasons', 'topWastes');
    }

    public function getWasteReasons()
    {
        return ReportReason::all();
    }

    public function getTopWastes()
    {
        return WasteEntry::select('category', 
                DB::raw('SUM(quantity) as quantity'),
                DB::raw('SUM(cost) as cost'),
                DB::raw('AVG(usage_percentage) as usage_percentage'))
            ->groupBy('category')
            ->orderByDesc('cost')
            ->limit(5)
            ->get();
    }

    public function getReportForm()
    {
        $wasteReasons = $this->getWasteReasons();
        $recipes = Recipe::all();
        return view('kitchen.reports_form', compact('wasteReasons', 'recipes'));
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