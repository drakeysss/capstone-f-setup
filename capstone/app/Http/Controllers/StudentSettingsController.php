<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StudentSetting;

class StudentSettingsController extends Controller
{
    public function viewSettings()
    {
        return view('student.studentSettings');
    }

    public function updateSettings(Request $request)
    {
        return redirect()->back()->with('success', 'Settings updated successfully.');
    }

    public function saveSettings(Request $request)
    {
        $settings = new StudentSetting();
        $settings->setting_name = $request->input('setting_name');
        $settings->setting_value = $request->input('setting_value');
        $settings->save();

        return redirect()->back()->with('success', 'Settings saved successfully.');
    }
} 