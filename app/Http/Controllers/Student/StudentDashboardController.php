<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    public function index()
    {
        return view('student.dashboard');
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
}