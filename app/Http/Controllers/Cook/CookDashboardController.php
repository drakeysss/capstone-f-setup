<?php

namespace App\Http\Controllers\Cook;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CookDashboardController extends Controller
{
    public function index()
    {
        return view('cook.dashboard');
    }

    public function consumption()
    {
        return view('cook.consumption');
    }

    public function orders()
    {
        return view('cook.orders');
    }

    public function menu()
    {
        return view('cook.menu');
    }

    public function inventory()
    {
        return view('cook.inventory');
    }

    public function profile()
    {
        return view('cook.profile');
    }

    public function settings()
    {
        return view('cook.settings');
    }

    public function suppliers()
    {
        return view('cook.suppliers');
    }

    public function reports()
    {
        return view('cook.reports');
    }

    public function notifications()
    {
        return view('cook.notifications');
    }
}