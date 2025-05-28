<?php

namespace App\Http\Controllers\Cook;

use App\Http\Controllers\Controller;
use App\Models\PurchaseOrder;
use App\Models\PurchaseOrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PurchaseOrderController extends Controller
{
    public function index()
    {
        $purchaseOrders = PurchaseOrder::with('items')
            ->orderBy('id', 'asc')
            ->get();

        return view('cook.purchase-orders.index', compact('purchaseOrders'));
    }

    public function create()
    {
        return view('cook.purchase-orders.create');
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'order_date' => 'required|date',
                'items' => 'required|array|min:1',
                'items.*.name' => 'required|string',
                'items.*.quantity' => 'required|numeric|min:0.01',
                'items.*.unit' => 'required|string',
                'items.*.price' => 'required|numeric|min:0.01',
            ]);

            DB::beginTransaction();

            $totalCost = collect($request->items)->sum(function ($item) {
                return $item['quantity'] * $item['price'];
            });

            $purchaseOrder = PurchaseOrder::create([
                'order_date' => $request->order_date,
                'total_cost' => $totalCost,
                'status' => 'pending'
            ]);

            foreach ($request->items as $item) {
                PurchaseOrderItem::create([
                    'purchase_order_id' => $purchaseOrder->id,
                    'name' => $item['name'],
                    'quantity' => $item['quantity'],
                    'unit' => $item['unit'],
                    'price' => $item['price']
                ]);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Purchase order created successfully',
                'redirect' => route('cook.purchase-orders.index')
            ]);

        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to create purchase order: ' . $e->getMessage()
            ], 422);
        }
    }

    public function show(PurchaseOrder $purchaseOrder)
    {
        try {
            $purchaseOrder->load('items');
            return response()->json([
                'success' => true,
                'order' => $purchaseOrder
            ]);
        } catch (\Exception $e) {
            \Log::error('Failed to load purchase order details: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Failed to load order details: ' . $e->getMessage()
            ], 500);
        }
    }

    public function edit(PurchaseOrder $purchaseOrder)
    {
        $purchaseOrder->load('items');
        return view('cook.purchase-orders.edit', compact('purchaseOrder'));
    }

    public function update(Request $request, PurchaseOrder $purchaseOrder)
    {
        if ($purchaseOrder->status !== 'pending') {
            return response()->json([
                'success' => false,
                'message' => 'Cannot update a completed or cancelled purchase order'
            ], 422);
        }

        $request->validate([
            'order_date' => 'required|date',
            'items' => 'required|array|min:1',
            'items.*.name' => 'required|string',
            'items.*.quantity' => 'required|numeric|min:0.01',
            'items.*.unit' => 'required|string',
            'items.*.price' => 'required|numeric|min:0.01',
        ]);

        try {
            DB::beginTransaction();

            $purchaseOrder->update([
                'order_date' => $request->order_date,
                'total_cost' => $request->total_cost
            ]);

            // Delete existing items
            $purchaseOrder->items()->delete();

            // Create new items
            foreach ($request->items as $item) {
                PurchaseOrderItem::create([
                    'purchase_order_id' => $purchaseOrder->id,
                    'name' => $item['name'],
                    'quantity' => $item['quantity'],
                    'unit' => $item['unit'],
                    'price' => $item['price']
                ]);
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Purchase order updated successfully'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to update purchase order'
            ], 500);
        }
    }

    public function destroy(PurchaseOrder $purchaseOrder)
    {
        try {
            DB::beginTransaction();
            $purchaseOrder->items()->delete();
            $purchaseOrder->delete();
            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Purchase order deleted successfully'
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json([
                'success' => false,
                'message' => 'Failed to delete purchase order'
            ], 500);
        }
    }

    public function updateStatus(Request $request, PurchaseOrder $purchaseOrder)
    {
        $request->validate([
            'status' => 'required|in:pending,completed,cancelled'
        ]);

        try {
            $purchaseOrder->update([
                'status' => $request->status
            ]);

            return response()->json([
                'success' => true,
                'message' => 'Status updated successfully'
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to update status: ' . $e->getMessage()
            ], 500);
        }
    }

    public function pending()
    {
        $purchaseOrders = PurchaseOrder::with('items')
            ->where('status', 'pending')
            ->orderBy('id', 'asc')
            ->get();

        return view('cook.purchase-orders.index', compact('purchaseOrders'));
    }

    public function completed()
    {
        $purchaseOrders = PurchaseOrder::with('items')
            ->where('status', 'completed')
            ->orderBy('id', 'asc')
            ->get();

        return view('cook.purchase-orders.index', compact('purchaseOrders'));
    }
} 