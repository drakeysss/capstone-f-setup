<?php

namespace App\Http\Controllers\Kitchen;

use App\Http\Controllers\Dashboard\BaseDashboardController;
use Illuminate\Http\Request;
use App\Models\Recipe;

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

    public function recipes()
    {
        return view('kitchen.recipes');
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