<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SupplierManagementController extends Controller
{
    public function showSupplier()
    {
        return view('admin.supplier.index');
    }
} 