<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WeeklyMenuOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'week',
        'day',
        'meal_type',
        'menu_item',
        'is_editable',
        'ingredients'
    ];

    protected $casts = [
        'is_editable' => 'boolean',
        'ingredients' => 'string'
    ];
} 