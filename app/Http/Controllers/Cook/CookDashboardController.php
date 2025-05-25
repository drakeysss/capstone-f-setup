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

        // Get menu statistics
        $activeMenuItems = Menu::where('is_available', true)->count();
        $totalMenuItems = Menu::count();
        
        // Get weekly menu for Week 1 & 3 Saturday
        $weeklyMenu = WeeklyMenuOrder::where('week', 'Week 1 & 3')
            ->where('day', 'Saturday')
            ->orderBy('meal_type')
            ->get();

        // Get menu items
        $menuItems = Menu::where('is_available', true)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        // Get supplier statistics
        $activeSuppliers = Supplier::count();
        $recentSuppliers = Supplier::orderBy('created_at', 'desc')
            ->take(3)
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
            'activeMenuItems',
            'totalMenuItems',
            'menuItems',
            'weeklyMenu',
            'activeSuppliers',
            'recentSuppliers',
            'recentOrders',
            'lowStockItems',
            'totalItems',
            'lowStockItemsList'
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