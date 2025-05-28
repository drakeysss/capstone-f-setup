<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
<<<<<<< HEAD
    protected $fillable = [
        'recipe_week',
        'recipe_day',
        'recipe_type',
        'recipe_name',
        'recipe_status'
    ];
} 
=======
    protected $table = 'recipes';

    protected $primaryKey = 'recipe_id';

    protected $fillable = [
        'recipe_name',
        'recipe_week',
        'recipe_day',
        'recipe_type',
    ];

    public $timestamps = true;
}
>>>>>>> 82754a1e2f45f8a597819039003eb702cc4c5524
