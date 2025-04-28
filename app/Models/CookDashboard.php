<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CookDashboard extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'task_description',
        'status',
        'due_date'
    ];

    protected $casts = [
        'due_date' => 'date'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
} 