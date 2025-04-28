<?php

namespace App\Http\Controllers\Cook;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CookSupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:cook');
    }

    public function index()
    {
        return view('cook.suppliers');
    }
}