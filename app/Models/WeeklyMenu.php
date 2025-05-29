<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WeeklyMenu extends Model
{
    protected $fillable = [
        'week_type',
        'day',
        'meal_type',
        'menu',
        'ingredients'
    ];
} 