<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Settings\BaseSettingsController;
use Illuminate\Http\Request;

class AdminSettingsController extends BaseSettingsController
{
    public function __construct()
    {
        parent::__construct('admin', 'admin');
    }

    public function index()
    {
        return view('admin.settings');
    }
}