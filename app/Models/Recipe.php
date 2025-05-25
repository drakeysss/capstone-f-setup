<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $fillable = [
        'recipe_week',
        'recipe_day',
        'recipe_type',
        'recipe_name',
        'recipe_status'
    ];
} 