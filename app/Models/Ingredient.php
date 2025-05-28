<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ingredient extends Model
{
  
    use HasFactory;

    protected $table = 'ingredients';
    protected $primaryKey = 'ingredient_id';
  
  
    protected $fillable = [
        'ingredient_name',
        'ingredient_category',
        'ingredient_unit',
        'ingredient_price',
        'ingredient_quantity',
    ];
}
