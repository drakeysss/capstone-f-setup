<?php

namespace App\Http\Controllers\Cook;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supplier;
use App\Models\PurchaseOrder;
use Illuminate\Support\Facades\DB;
use Exception;

class SupplierController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::with(['purchaseOrders' => function($query) {
            $query->latest();
        }])->get();

        return view('cook.suppliers', compact('suppliers'));
    }

    public function store(Request $request)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'contact_number' => 'required|string|max:20',
                'email' => 'required|email|max:255|unique:suppliers,email',
                'address' => 'required|string|max:500'
            ]);

            DB::beginTransaction();
            Supplier::create($validated);
            DB::commit();

            return redirect()->route('cook.suppliers.index')
                ->with('success', 'Supplier added successfully');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('cook.suppliers.index')
                ->with('error', 'Failed to add supplier. ' . $e->getMessage());
        }
    }

    public function update(Request $request, Supplier $supplier)
    {
        try {
            $validated = $request->validate([
                'name' => 'required|string|max:255',
                'contact_number' => 'required|string|max:20',
                'email' => 'required|email|max:255|unique:suppliers,email,' . $supplier->id,
                'address' => 'required|string|max:500'
            ]);

            DB::beginTransaction();
            $supplier->update($validated);
            DB::commit();

            return redirect()->route('cook.suppliers.index')
                ->with('success', 'Supplier updated successfully');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('cook.suppliers.index')
                ->with('error', 'Failed to update supplier. ' . $e->getMessage());
        }
    }

    public function destroy(Supplier $supplier)
    {
        try {
            if ($supplier->purchaseOrders()->exists()) {
                return redirect()->route('cook.suppliers.index')
                    ->with('error', 'Cannot delete supplier with existing purchase orders.');
            }

            DB::beginTransaction();
            $supplier->delete();
            DB::commit();

            return redirect()->route('cook.suppliers.index')
                ->with('success', 'Supplier deleted successfully');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('cook.suppliers.index')
                ->with('error', 'Failed to delete supplier. ' . $e->getMessage());
        }
    }

    public function createPurchaseOrder(Request $request)
    {
        try {
            $validated = $request->validate([
                'supplier_id' => 'required|exists:suppliers,id',
                'items' => 'required|array|min:1',
                'items.*.name' => 'required|string|max:255',
                'items.*.quantity' => 'required|numeric|min:0.01',
                'items.*.unit' => 'required|string|max:50',
                'total_amount' => 'required|numeric|min:0.01',
                'status' => 'required|in:pending,approved,delivered'
            ]);

            DB::beginTransaction();
            
            $purchaseOrder = PurchaseOrder::create([
                'supplier_id' => $validated['supplier_id'],
                'items' => json_encode($validated['items']),
                'total_amount' => $validated['total_amount'],
                'status' => $validated['status']
            ]);

            DB::commit();

            return redirect()->route('cook.suppliers.index')
                ->with('success', 'Purchase order created successfully');
        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('cook.suppliers.index')
                ->with('error', 'Failed to create purchase order. ' . $e->getMessage());
        }
    }

    public function purchaseOrder(Request $request)
    {
        try {
            $validated = $request->validate([
                'items' => 'required|array',
                'items.*.description' => 'required|string',
                'items.*.quantity' => 'required|numeric|min:1',
                'items.*.unit' => 'required|string',
                'items.*.unit_price' => 'required|numeric|min:0',
            ]);

            DB::beginTransaction();

            $totalAmount = collect($validated['items'])->sum(function ($item) {
                return $item['quantity'] * $item['unit_price'];
            });

            $supplier = Supplier::first();
            if (!$supplier) {
                return response()->json([
                    'success' => false,
                    'message' => 'No supplier found. Please add a supplier first.'
                ], 400);
            }

            $purchaseOrder = PurchaseOrder::create([
                'supplier_id' => $supplier->id,
                'status' => 'pending',
                'total_amount' => $totalAmount,
            ]);

            foreach ($validated['items'] as $item) {
                $purchaseOrder->items()->create([
                    'description' => $item['description'],
                    'quantity' => $item['quantity'],
                    'unit' => $item['unit'],
                    'unit_price' => $item['unit_price'],
                    'total_price' => $item['quantity'] * $item['unit_price'],
                ]);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Purchase order created successfully',
                'purchase_order' => $purchaseOrder->load('items')
            ]);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to create purchase order: ' . $e->getMessage()
            ], 500);
        }
    }

    public function getPurchaseOrders()
    {
        $purchaseOrders = PurchaseOrder::with(['items', 'supplier'])
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'purchase_orders' => $purchaseOrders
        ]);
    }

    public function purchaseOrderPage() {
        return view('cook.purchase_order');
    }
}
