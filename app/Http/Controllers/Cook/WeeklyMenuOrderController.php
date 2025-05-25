<?php

namespace App\Http\Controllers\Cook;

use App\Http\Controllers\Controller;
use App\Models\WeeklyMenuOrder;
use Illuminate\Http\Request;

class WeeklyMenuOrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:cook');
    }

    public function index()
    {
        $week1And3Orders = WeeklyMenuOrder::where('week', 'Week 1 & 3')
            ->orderBy('day')
            ->get()
            ->groupBy('day');

        $week2And4Orders = WeeklyMenuOrder::where('week', 'Week 2 & 4')
            ->orderBy('day')
            ->get()
            ->groupBy('day');

        return view('cook.menu.weekly', compact('week1And3Orders', 'week2And4Orders'));
    }

    public function update(Request $request, WeeklyMenuOrder $weeklyMenuOrder)
    {
        if (!$weeklyMenuOrder->is_editable) {
            return response()->json(['error' => 'This menu item is not editable'], 403);
        }

        $validated = $request->validate([
            'menu_item' => 'required|string|max:255',
            'ingredients' => 'nullable|string'
        ]);

        $weeklyMenuOrder->update($validated);

        return response()->json(['success' => true, 'message' => 'Menu item updated successfully']);
    }

    public function toggleEditability(WeeklyMenuOrder $weeklyMenuOrder)
    {
        $weeklyMenuOrder->update([
            'is_editable' => !$weeklyMenuOrder->is_editable
        ]);

        return response()->json([
            'success' => true,
            'is_editable' => $weeklyMenuOrder->is_editable
        ]);
    }
} 