<?php

namespace App\Http\Controllers;

use App\Models\ReportReason;
use App\Models\WasteEntry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KitchenReportController extends Controller
{
    public function index()
    {
        $wasteReasons = ReportReason::withCount(['wasteEntries as total_entries'])
            ->withSum('wasteEntries as total_cost', 'cost')
            ->get()
            ->map(function ($reason) {
                $reason->percentage = $reason->total_entries > 0 
                    ? round(($reason->total_cost / WasteEntry::sum('cost')) * 100, 2)
                    : 0;
                return $reason;
            });

        $topWastes = WasteEntry::select('category', 
                DB::raw('SUM(quantity) as quantity'),
                DB::raw('SUM(cost) as cost'),
                DB::raw('AVG(usage_percentage) as usage_percentage'))
            ->groupBy('category')
            ->orderByDesc('cost')
            ->limit(5)
            ->get();

        return view('kitchen.reports', compact('wasteReasons', 'topWastes'));
    }
} 