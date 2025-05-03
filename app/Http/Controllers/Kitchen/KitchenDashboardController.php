<?php

namespace App\Http\Controllers\Kitchen;

use App\Http\Controllers\Dashboard\BaseDashboardController;
use Illuminate\Http\Request;

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
    public function recipes()
    {
        return view('kitchen.recipes');
    }

    public function mealPlanning()
    {
        return view('kitchen.meal-planning');
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