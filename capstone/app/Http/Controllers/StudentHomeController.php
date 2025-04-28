<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentHomeController extends Controller
{
    public function viewStudentHome()
    {
        return view('student.studentHome');
    }
}
