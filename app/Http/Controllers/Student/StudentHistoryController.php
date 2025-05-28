<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Report;
use App\Models\Menu;
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
        // Get past menus for the last 30 days
        $menus = Menu::where('date', '<', now()->startOfDay())
            ->orderBy('date', 'desc')
            ->get()
            ->groupBy(function($menu) {
                return Carbon::parse($menu->date)->format('Y-m-d');
            });

        // Get user's ratings/feedback
        $ratings = Report::where('student_id', Auth::id())
            ->where('report_date', '<', now()->startOfDay())
            ->orderBy('report_date', 'desc')
            ->get()
            ->groupBy(function($report) {
                return Carbon::parse($report->report_date)->format('Y-m-d');
            });

        // Generate dates for the last 30 days
        $dates = collect();
        for ($i = 1; $i <= 30; $i++) {
            $date = now()->subDays($i)->format('Y-m-d');
            $dates->put($date, collect());
        }

        // Merge dates with menus
        $allDates = $dates->map(function($empty, $date) use ($menus) {
            return $menus->get($date, collect());
        });

        return view('student.history', compact('allDates', 'ratings'));
    }

    public function storeRating(Request $request)
    {
        $request->validate([
            'date' => 'required|date',
            'meal_type' => 'required|in:breakfast,lunch,dinner',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:500',
            'meal_name' => 'required|string',
            'meal_description' => 'required|string'
        ]);

        $report = Report::updateOrCreate(
            [
                'student_id' => Auth::id(),
                'report_date' => $request->date,
                'meal_type' => $request->meal_type
            ],
            [
                'rating' => $request->rating,
                'feedback' => $request->comment,
                'meal_items' => [
                    'name' => $request->meal_name,
                    'description' => $request->meal_description
                ]
            ]
        );

        return response()->json([
            'success' => true,
            'report' => $report
        ]);
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