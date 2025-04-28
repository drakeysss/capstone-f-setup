<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Order;
use App\Models\Menu;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('role:admin');
    }

    public function dashboard()
    {
        $totalUsers = User::count();
        $totalOrders = Order::count();
        $totalMenuItems = Menu::count();
        $totalRevenue = Order::where('status', 'completed')->sum('total');
        $recentOrders = Order::with('student')
            ->latest()
            ->take(10)
            ->get();

        return view('admin.dashboard', compact(
            'totalUsers',
            'totalOrders',
            'totalMenuItems',
            'totalRevenue',
            'recentOrders'
        ));
    }

    public function users()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function menus()
    {
        $menus = Menu::all();
        return view('admin.menus.index', compact('menus'));
    }

    public function orders()
    {
        $orders = Order::with('student')->latest()->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function reports()
    {
        return view('admin.reports.index');
    }

    public function settings()
    {
        return view('admin.settings');
    }

    public function analytics()
    {
        // Get monthly revenue for the last 6 months
        $monthlyRevenue = Order::where('status', 'completed')
            ->where('created_at', '>=', Carbon::now()->subMonths(6))
            ->select(
                DB::raw('MONTH(created_at) as month'),
                DB::raw('YEAR(created_at) as year'),
                DB::raw('SUM(total) as revenue')
            )
            ->groupBy('year', 'month')
            ->orderBy('year')
            ->orderBy('month')
            ->get()
            ->map(function ($item) {
                return [
                    'month' => Carbon::createFromDate($item->year, $item->month, 1)->format('M'),
                    'revenue' => $item->revenue
                ];
            });

        // Get order statistics
        $orderStats = Order::select('status', DB::raw('count(*) as count'))
            ->groupBy('status')
            ->get();

        // Get popular menu items
        $popularItems = Order::join('order_items', 'orders.id', '=', 'order_items.order_id')
            ->join('menu_items', 'order_items.menu_item_id', '=', 'menu_items.id')
            ->select('menu_items.name', DB::raw('COUNT(*) as order_count'))
            ->groupBy('menu_items.id', 'menu_items.name')
            ->orderByDesc('order_count')
            ->limit(5)
            ->get();

        // Get daily user activity for the last week
        $userActivity = Order::where('created_at', '>=', Carbon::now()->subDays(7))
            ->select(
                DB::raw('DATE(created_at) as date'),
                DB::raw('COUNT(DISTINCT user_id) as active_users')
            )
            ->groupBy('date')
            ->orderBy('date')
            ->get()
            ->map(function ($item) {
                return [
                    'day' => Carbon::parse($item->date)->format('D'),
                    'active_users' => $item->active_users
                ];
            });

        return view('admin.analytics', compact(
            'monthlyRevenue',
            'orderStats',
            'popularItems',
            'userActivity'
        ));
    }
} 