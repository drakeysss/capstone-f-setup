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

    public function getStockStatus(){
            $lowStockThreshold = [
                'kg'        => 0.5,
                'pcs'       => 10,
                'pack/s'    => 1,
                'tray/s'    => 1,
                'can/s'     => 1,
                'bottle/s'  => 1,
                'box/es'    => 1,
                'gallon/s'  => 1,
                'container/s'=> 1,
                'dozen/s'   => 1,
            ];
    }
}
