<?php

namespace App\Http\Controllers\Cook;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Menu;
use App\Models\Inventory;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:cook');
    }

    public function index()
    {
        return view('cook.orders.index');
    }

    public function pendingOrders()
    {
        $orders = Order::with(['items.menu', 'student'])
            ->whereIn('status', ['pending', 'preparing'])
            ->orderBy('created_at', 'asc')
            ->get();
        $menuItems = Menu::where('is_available', true)->get();
        return view('cook.orders.pending', compact('orders', 'menuItems'));
    }

    public function completedOrders()
    {
        $orders = Order::with(['items.menu', 'student'])
            ->where('status', 'completed')
            ->orderBy('updated_at', 'desc')
            ->paginate(20);
        return view('cook.orders.completed', compact('orders'));
    }

    public function lowStockItems()
    {
        $lowStockItems = Inventory::where('quantity', '<=', \DB::raw('minimum_stock'))
            ->orderBy('quantity')
            ->get();
        return view('cook.inventory.low-stock', compact('lowStockItems'));
    }

    public function activeMenuItems()
    {
        $menuItems = Menu::with('category')
            ->where('is_available', true)
            ->orderBy('name')
            ->get();
        return view('cook.menu.active', compact('menuItems'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'items' => 'required|array',
            'items.*.menu_id' => 'required|exists:menus,id',
            'items.*.quantity' => 'required|integer|min:1'
        ]);

        $order = Order::create([
            'status' => 'pending',
            'total_amount' => 0
        ]);

        $total = 0;
        foreach ($request->items as $item) {
            $menu = Menu::find($item['menu_id']);
            $subtotal = $menu->price * $item['quantity'];
            $total += $subtotal;

            OrderItem::create([
                'order_id' => $order->id,
                'menu_id' => $item['menu_id'],
                'quantity' => $item['quantity'],
                'price' => $menu->price,
                'subtotal' => $subtotal
            ]);
        }

        $order->update(['total_amount' => $total]);

        return response()->json(['success' => true]);
    }

    public function complete($id)
    {
        $order = Order::findOrFail($id);
        $order->update(['status' => 'completed']);
        return response()->json(['success' => true]);
    }

    public function show($id)
    {
        $order = Order::with(['items.menu', 'student'])->findOrFail($id);
        return view('cook.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $validated = $request->validate([
            'status' => 'required|in:pending,preparing,ready,completed,cancelled'
        ]);

        $order->update(['status' => $validated['status']]);

        // If order is completed, update inventory
        if ($validated['status'] === 'completed') {
            foreach ($order->items as $item) {
                foreach ($item->menu->ingredients as $ingredient) {
                    $inventoryItem = $ingredient->inventoryItem;
                    $quantityToDeduct = $ingredient->quantity_required * $item->quantity;
                    
                    if ($inventoryItem->quantity < $quantityToDeduct) {
                        return back()->withErrors(['error' => "Insufficient stock for {$inventoryItem->name}"]);
                    }

                    $inventoryItem->decrement('quantity', $quantityToDeduct);
                }
            }
        }

        return redirect()->route('cook.orders.index')->with('success', 'Order status updated successfully');
    }

    public function dailyOrders()
    {
        $orders = Order::with(['items.menu', 'student'])
            ->whereDate('created_at', today())
            ->orderBy('created_at', 'desc')
            ->get();
        return view('cook.orders.daily', compact('orders'));
    }

    public function orderHistory()
    {
        $orders = Order::with(['items.menu', 'student'])
            ->whereIn('status', ['completed', 'cancelled'])
            ->orderBy('created_at', 'desc')
            ->paginate(20);
        return view('cook.orders.history', compact('orders'));
    }

    public function analytics()
    {
        $dailyOrders = Order::whereDate('created_at', today())->count();
        $dailyRevenue = Order::whereDate('created_at', today())
            ->where('status', 'completed')
            ->sum('total_amount');
        
        $popularItems = OrderItem::with('menu')
            ->select('menu_id', \DB::raw('SUM(quantity) as total_quantity'))
            ->groupBy('menu_id')
            ->orderByDesc('total_quantity')
            ->limit(5)
            ->get();

        return view('cook.orders.analytics', compact('dailyOrders', 'dailyRevenue', 'popularItems'));
    }
}
