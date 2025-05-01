<?php

namespace App\Http\Controllers\Cook;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Menu;
use App\Models\Inventory;
use App\Models\Supplier;

class CookDashboardController extends Controller
{
    public function index()
    {
        // Get order statistics
        $pendingOrders = Order::whereIn('status', ['pending', 'preparing'])->count();
        $completedOrders = Order::where('status', 'completed')->count();

        // Get menu statistics
        $activeMenuItems = Menu::where('is_available', true)->count();
        $totalMenuItems = Menu::count();
        $menuItems = Menu::where('is_available', true)
            ->orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        // Get inventory statistics
        $lowStockItems = Inventory::where('quantity', '<=', \DB::raw('minimum_stock'))->count();
        $totalItems = Inventory::count();
        $lowStockItemsList = Inventory::where('quantity', '<=', \DB::raw('minimum_stock'))
            ->orderBy('quantity')
            ->take(3)
            ->get();

        // Get supplier statistics
        $activeSuppliers = Supplier::count();
        $recentSuppliers = Supplier::orderBy('created_at', 'desc')
            ->take(3)
            ->get();

        // Get recent orders
        $recentOrders = Order::with(['items.menu'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('cook.dashboard', compact(
            'pendingOrders',
            'completedOrders',
            'activeMenuItems',
            'totalMenuItems',
            'menuItems',
            'lowStockItems',
            'totalItems',
            'lowStockItemsList',
            'activeSuppliers',
            'recentSuppliers',
            'recentOrders'
        ));
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

    public function inventory()
    {
        return view('cook.inventory');
    }

    public function profile()
    {
        return view('cook.profile');
    }

    public function settings()
    {
        return view('cook.settings');
    }

    public function suppliers()
    {
        return view('cook.suppliers');
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