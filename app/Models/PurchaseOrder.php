<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PurchaseOrder extends Model
{
    use HasFactory;

    protected $fillable = [
        'order_date',
        'total_cost',
        'status'
    ];

    protected $casts = [
        'order_date' => 'datetime',
        'total_cost' => 'decimal:2',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    protected $with = ['items'];

    public function items()
    {
        return $this->hasMany(PurchaseOrderItem::class);
    }
} 