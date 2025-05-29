<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    
    protected $table = 'reports';
    protected $fillable = [
        'student_id',
        'report_date',
        'meal_type',
        'rating',
        'feedback'
    ];

    protected $casts = [
        'report_date' => 'date',
        'rating' => 'integer'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}