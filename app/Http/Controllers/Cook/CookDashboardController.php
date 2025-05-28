<?php

namespace App\Http\Controllers\Cook;

use App\Http\Controllers\Dashboard\BaseDashboardController;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Menu;
use App\Models\Supplier;
use App\Models\Inventory;
use App\Models\PurchaseOrder;
use App\Models\WeeklyMenuOrder;

class CookDashboardController extends BaseDashboardController
{
    public function __construct()
    {
        parent::__construct('cook', 'cook');
    }

    protected function getDashboardData()
    {
        // Get order statistics
        $pendingOrders = Order::whereIn('status', ['pending', 'preparing'])->count() + 
                        PurchaseOrder::where('status', 'pending')->count();
        $completedOrders = Order::where('status', 'completed')->count() + 
                          PurchaseOrder::where('status', 'completed')->count();

        // Get current day and week
        $currentDay = now()->format('l'); // Gets current day name (Monday, Tuesday, etc.)
        
        // Calculate week type based on the actual week of the month
        $dayOfMonth = now()->day;
        $weekOfMonth = ceil($dayOfMonth / 7);
        $weekType = ($weekOfMonth % 2 == 0) ? 'Week 2 & 4' : 'Week 1 & 3';
        
        // Get weekly menu for current day
        $weeklyMenu = WeeklyMenuOrder::where('week', $weekType)
            ->where('day', $currentDay)
            ->orderBy('meal_type')
            ->get();

        // Get the most recent completed purchase order
        $recentOrders = PurchaseOrder::with(['items'])
            ->where('status', 'completed')
            ->orderBy('updated_at', 'desc')
            ->take(1)
            ->get();

        // Get inventory statistics
        $lowStockItems = Inventory::where('quantity', '<=', \DB::raw('minimum_stock'))->count();
        $totalItems = Inventory::count();
        $lowStockItemsList = Inventory::where('quantity', '<=', \DB::raw('minimum_stock'))
            ->orderBy('quantity', 'asc')
            ->take(3)
            ->get();

        return compact(
            'pendingOrders',
            'completedOrders',
            'weeklyMenu',
            'recentOrders',
            'lowStockItems',
            'totalItems',
            'lowStockItemsList',
            'currentDay',
            'weekType'
        );
    }

    public function consumption()
    {
        return view('cook.consumption');
    }

    public function orders()
    {
        return view('cook.orders');
    }

    public function menu()
    {
        return view('cook.menu');
    }

    public function profile()
    {
        return view('cook.profile');
    }

    public function suppliers()
    {
        return view('cook.suppliers');
    }

    public function settings()
    {
        return view('cook.settings');
    }

    public function reports()
    {
        return view('cook.reports');
    }

    public function notifications()
    {
        return view('cook.notifications');
    }
}