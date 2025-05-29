<?php

namespace App\Http\Controllers\Cook;

use App\Http\Controllers\Dashboard\BaseDashboardController;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Menu;
use App\Models\Supplier;
use App\Models\Inventory;
use App\Models\PurchaseOrder;
use App\Models\WeeklyMenu;
use Illuminate\Support\Facades\Log;
use Carbon\Carbon;

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

        // Get inventory statistics
        $lowStockItems = Inventory::where('quantity', '<=', \DB::raw('minimum_stock'))->count();
        $totalItems = Inventory::count();
        $lowStockItemsList = Inventory::where('quantity', '<=', \DB::raw('minimum_stock'))
            ->orderBy('quantity', 'asc')
            ->take(3)
            ->get();

        // Determine current day and week type
        $currentDay = Carbon::now()->format('l'); // Get current day name (e.g., Monday, Tuesday)

        // Determine if it's Week 1&3 or Week 2&4 based on calendar week parity
        $currentCalendarWeek = Carbon::now()->weekOfYear; // Get the current calendar week number of the year
        $weekType = ($currentCalendarWeek % 2 != 0) ? 'week1' : 'week2';

        // Get today's menu items from the weekly_menus table
        $todaysMenu = WeeklyMenu::where('day', strtolower($currentDay))
            ->where('week_type', $weekType)
            ->orderByRaw("FIELD(meal_type, 'breakfast', 'lunch', 'dinner')")
            ->get();

        return compact(
            'pendingOrders',
            'completedOrders',
            'lowStockItems',
            'totalItems',
            'lowStockItemsList',
            'todaysMenu',
            'currentDay'
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