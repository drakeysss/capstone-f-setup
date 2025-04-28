<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentSettingsController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:student');
    }

    public function index()
    {
        return view('student.settings');
    }

    public function viewSettings()
    {
        return view('student.settings');
    }

    public function updateSettings(Request $request)
    {
        // Update settings logic
        return redirect()->back()->with('success', 'Settings updated successfully');
    }

    public function updatePreferences(Request $request)
    {
        // Update preferences logic
        return redirect()->back()->with('success', 'Preferences updated successfully');
    }
} 