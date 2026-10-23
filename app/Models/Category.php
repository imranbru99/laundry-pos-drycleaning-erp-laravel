<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    protected $fillable = ['name', 'bn_name', 'icon', 'sort_order'];

    public function garments(): HasMany
    {
        return $this->hasMany(Garment::class);
    }
}
