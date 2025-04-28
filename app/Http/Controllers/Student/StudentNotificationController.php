<?php

namespace App\Http\Controllers\Student;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentNotificationController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:student');
    }

    public function index()
    {
        return view('student.notifications');
    }
}