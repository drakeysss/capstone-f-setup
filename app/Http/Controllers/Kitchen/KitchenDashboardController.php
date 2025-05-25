<?php

namespace App\Http\Controllers\Kitchen;

use App\Http\Controllers\Dashboard\BaseDashboardController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Recipe;
use App\Models\ReportReason;
use App\Models\WasteEntry;

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
    public function recipes()
    {
        return view('kitchen.recipes');
    }

    public function mealPlanning()
    {
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
        return view('kitchen.inventory');
    }


    public function generateInventory()
    {
        

        return view('kitchen.inventory.generate');
    }













    //Kitchen Suppliers Management
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