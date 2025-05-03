<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Dashboard\BaseDashboardController;
use Illuminate\Http\Request;
use App\Models\Report;
use Illuminate\Support\Facades\Auth;

class StudentDashboardController extends BaseDashboardController
{
    public function __construct()
    {
        parent::__construct('student', 'student');
    }

    protected function getDashboardData()
    {
        $reports = Report::where('student_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return [
            'reports' => $reports,
            'recentOrders' => parent::getDashboardData()['recentOrders']
        ];
    }

    public function menu()
    {
        return view('student.menu');
    }

    public function orders()
    {
        return view('student.orders');
    }

    public function cart()
    {
        return view('student.cart');
    }

    public function profile()
    {
        return view('student.profile');
    }

    public function notifications()
    {
        return view('student.notifications');
    }

    public function settings()
    {
        return view('student.settings');
    }

    public function reports()
    {
        $reports = Report::where('student_id', Auth::id())
            ->orderBy('created_at', 'desc')
            ->get();
            
        return view('student.reports', compact('reports'));
    }

    public function storeReport(Request $request)
    {
        $request->validate([
            'meal_type' => 'required|in:breakfast,lunch,dinner',
            'report_date' => 'required|date',
            'meal_items' => 'required|array',
            'meal_items.*' => 'required|string',
            'feedback' => 'required|string',
            'rating' => 'required|integer|min:1|max:5'
        ]);

        $report = Report::create([
            'student_id' => Auth::id(),
            'meal_type' => $request->meal_type,
            'report_date' => $request->report_date,
            'meal_items' => json_encode($request->meal_items),
            'feedback' => $request->feedback,
            'rating' => $request->rating
        ]);

        return response()->json([
            'success' => true,
            'report' => $report
        ]);
    }
}