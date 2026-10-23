<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderItem extends Model
{
    protected $fillable = [
        'order_id',
        'garment_id',
        'service_name',
        'unit_price',
        'quantity',
        'subtotal',
        'barcode_tag',
        'defects_note',
        'status',
    ];

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function garment(): BelongsTo
    {
        return $this->belongsTo(Garment::class);
    }
}
