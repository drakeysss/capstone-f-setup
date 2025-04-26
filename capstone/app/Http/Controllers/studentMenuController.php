<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class studentMenuController extends Controller
{
    public function index()
    {
        return view('student.studentDailyMenu');
    }

    public function show()
    {
        $dailyMenu = \App\Models\studentMeal::all();
        return view('student.studentDailyMenu', compact('dailyMenu'));
    }

    public function create()
    {
        return view('student.studentDailyMenu');
    }

    public function store(Request $request)
    {
        
        $studentMenu = new StudentMenu();
        $studentMenu->menu_item = $request->input('menu_item');
        $studentMenu->save();
        
        $request->validate([
            'menu_item' => 'required|string|max:255',
            'date' => 'required|date',
        ]); 


        
        return redirect()->route('student.studentDailyMenu.index');
    }

}
