<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function showNotification()
    {
        return view('admin.AdminNotif');
    }
}
