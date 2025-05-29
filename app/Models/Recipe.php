<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    protected $table = 'recipes';

    protected $primaryKey = 'recipe_id';

    protected $fillable = [
        'recipe_name',
        'recipe_week',
        'recipe_day',
        'recipe_type',
        'recipe_name',
        'recipe_ingredients',
        'recipe_status'
    ];

    public $timestamps = true;
}
