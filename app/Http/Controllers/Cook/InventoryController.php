<?php

namespace App\Http\Controllers\Cook;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Inventory;

class InventoryController extends Controller
{
    public function index()
    {
        $inventory = Inventory::all();
        return view('cook.inventory', compact('inventory'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'item_name' => 'required|string|max:255',
            'quantity' => 'required|numeric',
            'unit' => 'required|string|max:50',
            'category' => 'required|string|max:100',
            'expiry_date' => 'nullable|date',
            'minimum_stock' => 'required|numeric'
        ]);

        Inventory::create($validated);
        return redirect()->route('cook.inventory')->with('success', 'Item added successfully');
    }

    public function update(Request $request, Inventory $inventory)
    {
        $validated = $request->validate([
            'item_name' => 'required|string|max:255',
            'quantity' => 'required|numeric',
            'unit' => 'required|string|max:50',
            'category' => 'required|string|max:100',
            'expiry_date' => 'nullable|date',
            'minimum_stock' => 'required|numeric'
        ]);

        $inventory->update($validated);
        return redirect()->route('cook.inventory')->with('success', 'Item updated successfully');
    }

    public function destroy(Inventory $inventory)
    {
        $inventory->delete();
        return redirect()->route('cook.inventory')->with('success', 'Item deleted successfully');
    }

    public function updateStock(Request $request, Inventory $inventory)
    {
        $validated = $request->validate([
            'quantity' => 'required|numeric',
            'operation' => 'required|in:add,subtract'
        ]);

        $newQuantity = $validated['operation'] === 'add' 
            ? $inventory->quantity + $validated['quantity']
            : $inventory->quantity - $validated['quantity'];

        if ($newQuantity < 0) {
            return back()->withErrors(['quantity' => 'Insufficient stock']);
        }

        $inventory->update(['quantity' => $newQuantity]);
        return redirect()->route('cook.inventory')->with('success', 'Stock updated successfully');
    }

    public function lowStock()
    {
        $lowStock = Inventory::where('quantity', '<=', \DB::raw('minimum_stock'))->get();
        return view('cook.inventory.low-stock', compact('lowStock'));
    }

    public function expiringItems()
    {
        $expiringItems = Inventory::whereNotNull('expiry_date')
            ->where('expiry_date', '<=', now()->addDays(30))
            ->orderBy('expiry_date')
            ->get();
        return view('cook.inventory.expiring', compact('expiringItems'));
    }
}
