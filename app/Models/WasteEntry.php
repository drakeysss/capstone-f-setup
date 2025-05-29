<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WasteEntry extends Model
{
    protected $fillable = [
        'reason_id',
        'category',
        'quantity',
        'cost',
        'usage_percentage',
        'waste_date',
        'notes'
    ];

    protected $casts = [
        'waste_date' => 'date',
        'quantity' => 'decimal:2',
        'cost' => 'decimal:2',
        'usage_percentage' => 'decimal:2'
    ];

    public function reason()
    {
        return $this->belongsTo(ReportReason::class, 'reason_id', 'report_id');
    }
} 