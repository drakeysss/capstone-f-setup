<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SupplierManagementController extends Controller
{
    public function showSupplier()
    {
        return view('admin.adminSupplierManagement');
    }
}
