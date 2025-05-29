<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Student extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function meals()
    {
        return $this->hasMany(StudentMeal::class, 'user_id');
    }

    public function dailyMeals()
    {
        return $this->hasMany(studentDailyMeal::class, 'user_id');
    }

    public function reports()
    {
        return $this->hasMany(StudentReport::class, 'user_id');
    }

    public function analytics()
    {
        return $this->hasMany(StudentAnalytic::class, 'user_id');
    }

    public function settings()
    {
        return $this->hasMany(studentSetting::class, 'user_id');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'student_id');
    }
} 