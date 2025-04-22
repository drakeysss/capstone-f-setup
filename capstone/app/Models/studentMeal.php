<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class studentMeal extends Model
{
    protected $fillable = ['meal_id', 'meal_name', 'consumption_date', 'meal_type'];

    public function student()
    {
        return $this->belongsTo('App\Models\Student');
    }

    public function meal()
    {
        return $this->belongsTo('App\Models\Meal');
    }
    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('meal_name', 'like', '%' . request('search') . '%')
                ->orWhere('meal_id', 'like', '%' . request('search') . '%');
        }
    }
    public function scopeFilterByDate($query, $date)
    {
        return $query->whereDate('consumption_date', $date);
    }
    public function scopeFilterByMealType($query, $mealType)
    {
        return $query->where('meal_type', $mealType);
    }
}
