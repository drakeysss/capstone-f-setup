<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentMenuController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:student');
    }

    public function index()
    {
        return view('student.menu');
    }

    public function show()
    {
        return view('student.menu.show');
    }
}