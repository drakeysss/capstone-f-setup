<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\WeeklyMenuOrder;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class StudentHistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:student');
    }

    public function index()
    {
        // Get all weekly menu orders
        $menuOrders = WeeklyMenuOrder::all();

        // Convert week and day to actual dates
        $orders = collect();
        $currentDate = Carbon::now()->startOfWeek(); // Start from the beginning of current week
        $today = Carbon::now()->startOfDay();

        foreach ($menuOrders as $order) {
            // Extract week number and determine if it's week 1&3 or 2&4
            $weekPattern = $order->week;
            $isWeek1And3 = strpos($weekPattern, '1') !== false;
            $isWeek2And4 = strpos($weekPattern, '2') !== false;

            // Map day names to numbers (1 = Monday, 7 = Sunday)
            $dayMap = [
                'Monday' => 1,
                'Tuesday' => 2,
                'Wednesday' => 3,
                'Thursday' => 4,
                'Friday' => 5,
                'Saturday' => 6,
                'Sunday' => 7
            ];

            $dayNumber = $dayMap[$order->day] ?? 1;

            // Calculate dates for the past 4 weeks
            for ($weekOffset = -4; $weekOffset <= 0; $weekOffset++) {
                $weekStart = $currentDate->copy()->addWeeks($weekOffset);
                $date = $weekStart->copy()->addDays($dayNumber - 1);
                
                // Only add the date if it matches the week pattern and is not in the future
                if (($isWeek1And3 && ($weekOffset % 2 == 0)) || 
                    ($isWeek2And4 && ($weekOffset % 2 == 1))) {
                    
                    // Skip if the date is in the future
                    if ($date->startOfDay()->gt($today)) {
                        continue;
                    }
                    
                    $dateString = $date->format('Y-m-d');
                    
                    if (!$orders->has($dateString)) {
                        $orders->put($dateString, collect([
                            'items' => collect(),
                            'ratings' => collect()
                        ]));
                    }
                    
                    $orders[$dateString]['items']->push((object)[
                        'menu' => (object)[
                            'meal_type' => strtolower($order->meal_type),
                            'name' => $order->menu_item,
                            'description' => $order->ingredients
                        ]
                    ]);
                }
            }
        }

        // Get user's ratings/feedback
        $ratings = Report::where('user_id', Auth::id())
            ->orderBy('report_date', 'desc')
            ->get()
            ->groupBy(function($report) {
                return Carbon::parse($report->report_date)->format('Y-m-d');
            });

        // Add ratings to the orders collection
        foreach ($ratings as $date => $dayRatings) {
            if ($orders->has($date)) {
                $orders[$date]['ratings'] = $dayRatings;
            }
        }

        // Group orders by month and sort by date in descending order
        $groupedOrders = $orders->groupBy(function($order, $date) {
            return Carbon::parse($date)->format('Y-m');
        })->map(function($monthOrders) {
            return $monthOrders->sortByDesc(function($order, $date) {
                return $date;
            });
        })->sortByDesc(function($monthOrders, $month) {
            return $month;
        });

        return view('student.history', compact('groupedOrders', 'ratings'));
    }

    public function storeRating(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'feedback' => 'required|array',
            'feedback.*.rating' => 'required|integer|min:1|max:5',
            'feedback.*.comment' => 'nullable|string|max:500'
        ]);

        foreach ($request->feedback as $mealType => $feedback) {
            Report::updateOrCreate(
                [
                    'user_id' => Auth::id(),
                    'report_date' => $request->date,
                    'meal_type' => $mealType
                ],
                [
                    'rating' => $feedback['rating'],
                    'feedback' => $feedback['comment'] ?? null
                ]
            );
        }

        return response()->json(['success' => true]);
    }

    public function updateRating(Request $request, Report $report)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:500'
        ]);

        $report->update([
            'rating' => $request->rating,
            'feedback' => $request->comment
        ]);

        return response()->json([
            'success' => true,
            'report' => $report
        ]);
    }
}