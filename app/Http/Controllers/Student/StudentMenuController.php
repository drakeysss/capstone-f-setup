<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use App\Models\WeeklyMenuOrder;
use Illuminate\Http\Request;

class StudentMenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:student');
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

        return view('student.menu', compact('week1And3Orders', 'week2And4Orders'));
    }

    public function show()
    {
        return view('student.menu.show');
    }
}