<?php

namespace App\Http\Controllers\Cook;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\WeeklyMenu;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class WeeklyMenuController extends Controller
{
    public function index()
    {
        // Get all menu items and organize them by week, meal type, and day
        $menus = WeeklyMenu::all()->groupBy('week_type')
            ->map(function ($weekMenus) {
                return $weekMenus->groupBy('meal_type')
                    ->map(function ($mealMenus) {
                        return $mealMenus->groupBy('day')
                            ->map(function ($dayMenu) {
                                return [
                                    'menu' => $dayMenu->first()->menu,
                                    'ingredients' => $dayMenu->first()->ingredients
                                ];
                            });
                    });
            });

        return view('cook.weekly-menu.index', compact('menus'));
    }

    public function create()
    {
        return view('cook.weekly-menu.create');
    }

    public function store(Request $request)
    {
        // Delete existing menu items before starting the transaction
        WeeklyMenu::truncate();

        try {
            DB::beginTransaction();

            // Process Week 1 & 3 menu items
            $this->processWeekMenu($request, 'week1', ['breakfast', 'lunch', 'dinner']);

            // Process Week 2 & 4 menu items
            $this->processWeekMenu($request, 'week2', ['breakfast', 'lunch', 'dinner']);

            DB::commit();

            return response()->json(['success' => true, 'message' => 'Weekly menu saved successfully!']);
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Error saving weekly menu:' . $e->getMessage());
            return response()->json(['success' => false, 'message' => 'Error saving menu: ' . $e->getMessage()], 500);
        }
    }

    private function processWeekMenu(Request $request, $weekType, $mealTypes)
    {
        $days = ['monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday', 'sunday'];

        foreach ($mealTypes as $mealType) {
            foreach ($days as $day) {
                $menuKey = "{$weekType}_{$mealType}_{$day}_menu";
                $ingredientsKey = "{$weekType}_{$mealType}_{$day}_ingredients";

                $menuValue = $request->input($menuKey);
                // Ensure ingredients value is an empty string if null
                $ingredientsValue = $request->input($ingredientsKey) ?? '';

                // Check if both keys exist and the menu value is not empty
                if ($request->has($menuKey) && $request->has($ingredientsKey) && !empty($menuValue)) {
                    WeeklyMenu::create([
                        'week_type' => $weekType,
                        'day' => $day,
                        'meal_type' => $mealType,
                        'menu' => $menuValue,
                        'ingredients' => $ingredientsValue
                    ]);
                }
            }
        }
    }

    public function edit($id)
    {
        return view('cook.weekly-menu.edit', compact('id'));
    }

    public function update(Request $request, $id)
    {
        // TODO: Implement menu update logic
        return redirect()->route('cook.weekly-menu.index')
            ->with('success', 'Weekly menu updated successfully.');
    }

    public function destroy($id)
    {
        // TODO: Implement menu deletion logic
        return redirect()->route('cook.weekly-menu.index')
            ->with('success', 'Weekly menu deleted successfully.');
    }
} 