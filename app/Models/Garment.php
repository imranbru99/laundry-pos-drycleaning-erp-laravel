<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Garment extends Model
{
    protected $fillable = [
        'category_id',
        'name',
        'bn_name',
        'wash_iron_price',
        'steam_iron_price',
        'dry_clean_price',
        'image',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
