<?php

namespace App\Http\Controllers;

use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentReportController extends Controller
{
    public function index()
    {
        $reports = Report::where('student_id', Auth::id())
                        ->orderBy('report_date', 'desc')
                        ->paginate(10);

        return view('student.reports', compact('reports'));
    }

    public function update(Request $request, Report $report)
    {
        $request->validate([
            'rating' => 'required|integer|min:1|max:5',
            'feedback' => 'required|string|max:500'
        ]);

        $report->update([
            'rating' => $request->rating,
            'feedback' => $request->feedback
        ]);

        return response()->json(['success' => true]);
    }

    public function destroy(Report $report)
    {
        $report->delete();
        return response()->json(['success' => true]);
    }
} 