<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReportReason extends Model
{
    protected $table = 'reports_reasons_list';
    protected $primaryKey = 'report_id';
    
    protected $fillable = [
        'report_name'
    ];

    public function wasteEntries()
    {
        return $this->hasMany(WasteEntry::class, 'reason_id', 'report_id');
    }
} 